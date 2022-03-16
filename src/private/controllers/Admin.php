<?php
namespace App\Controllers;

use App\Libraries\Controller;

class Admin extends Controller
{
    public function __construct()
    {
        //empty func
    }

    public function index()
    {
        die("admin home page");
    }

    public function dashboard()
    {
        $userdata = $_SESSION['userdata'] ?? array();
        
        if (!isset($userdata['user_id'])) {
            header("Location: /public/pages/login");
        }
        $currentSection=$_GET['currentSection'] ?? '';
        // $join = ' JOIN users u ON(posts.post_user_id = u.user_id)';
        // $data['posts'] = $this->model('Posts')::find_by_sql("SELECT
        // `posts`.*,`u`.`username`
        // FROM
        // `posts` JOIN `users` u
        // ON(posts.post_user_id = u.user_id)");
        // var_dump($this->model('Posts')::connection()->last_query);
        $this->view('pages/admin/dashboard/header');
        $this->view('pages/admin/dashboard/nav');
        $this->view('pages/admin/dashboard/sidebar');
        $this->view('pages/admin/dashboard/main');
        if ($currentSection=='users') {
            $this->users();
        } elseif ($currentSection=='blogs') {
            $this->blogs();
        } elseif ($currentSection=='myprofile') {
            $this->myProfile();
        } elseif ($currentSection=='myblogs') {
            $this->myBlogs();
        }
        
        $this->view('pages/admin/dashboard/footer');
    }
    public function users()
    {
        $userdata = $_SESSION['userdata'] ?? array();
        
        if (!isset($userdata['user_id']) || $userdata['role'] != 'admin') {
            header("Location: /public/pages/login");
        }
        $users=$this->model('Users')::find('all');
        //print_r($users);
        $data=array();
        foreach ($users as $val) {
            array_push($data, array(
                'id'=>$val->user_id,
                'name'=>$val->user_name,
                'email'=>$val->user_email,
                'role'=>$val->role,
                'permission'=>$val->permission
            ));
        }
        //print_r($data);
        $this->view('pages/admin/dashboard/users', $data);
    }

    public function myProfile()
    {
        $userdata = $_SESSION['userdata'] ?? array();
        
        if (!isset($userdata['user_id'])) {
            header("Location: /public/pages/login");
        }
        $users=$this->model('Users')::find_by_user_id($userdata['user_id']);
        //print_r($users);
        $data=array(
                'id'=>$users->user_id,
                'name'=>$users->user_name,
                'email'=>$users->user_email,
                'role'=>$users->role,
                'permission'=>$users->permission
            );
        //print_r($data);
        $this->view('pages/admin/dashboard/myProfile', $data);
    }

    public function myBlogs()
    {
        $userdata = $_SESSION['userdata'] ?? array();
        
        if (!isset($userdata['user_id'])) {
            header("Location: /public/pages/login");
        }
        if ($userdata['role']!='writer') {
            die('<h2 class="text-warning">You are not a writer!</h2>');
        }
        $posts=$this->model('Posts')::find('all', array('conditions' => array('user_id=?', $userdata['user_id'])));
        $data=array();
        foreach ($posts as $val) {
            array_push($data, array(
                'id'=>$val->post_id ,
                'user_id'=>$val->user_id,
                'category_id'=>$val->category_id,
                'post_title'=>$val->post_title,
                'post_topic'=>$val->post_topic,
                'post_description'=>$val->post_description,
                'review_date'=>$val->review_date,
                'publish_date'=>$val->publish_date,
                'status'=>$val->status
            ));
        }
        $this->view('pages/admin/dashboard/myBlogs', $data);
    }
    public function blogs()
    {
        $userdata = $_SESSION['userdata'] ?? array();
        
        if (!isset($userdata['user_id']) || $userdata['role'] != 'admin') {
            header("Location: /public/pages/login");
        }
        $posts=$this->model('Posts')::find('all', array('order' => 'review_date asc'));
        //print_r($posts);
        $data=array();
        foreach ($posts as $val) {
            array_push($data, array(
                'id'=>$val->post_id ,
                'user_id'=>$val->user_id,
                'category_id'=>$val->category_id,
                'post_title'=>$val->post_title,
                'post_topic'=>$val->post_topic,
                'post_description'=>$val->post_description,
                'review_date'=>$val->review_date,
                'publish_date'=>$val->publish_date,
                'status'=>$val->status
            ));
        }
        $this->view('pages/admin/dashboard/posts', $data);
    }

    public function changeStatus()
    {
        $newStatus=$_GET['newStatus'];
        $blogId=$_GET['blogId'];
        $date=date('y-m-d');
        $user = $this->model('Posts')::find($blogId);
        $user->status = $newStatus;
        if ($newStatus=='review') {
            $user->publish_date = '';
            $user->review_date = $date;
        } else {
            $user->publish_date = $date;
        }
        $user->save();
        header("Location: /public/admin/dashboard&currentSection=blogs");
    }
    public function changeRole()
    {
        $newRole=$_GET['newRole'];
        $userId=$_GET['userId'];
        $user = $this->model('Users')::find($userId);
        $user->role = $newRole;
        $user->save();
        header("Location: /public/admin/dashboard&currentSection=users");
    }
    public function changePermission()
    {
        $newPer=$_GET['newPer'];
        $userId=$_GET['userId'];
        //echo $newPer.','.$userId;
        $user = $this->model('Users')::find($userId);
        $user->permission = $newPer;
        $user->save();
        header("Location: /public/admin/dashboard&currentSection=users");
    }
}
