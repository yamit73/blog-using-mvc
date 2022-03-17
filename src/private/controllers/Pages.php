<?php
namespace App\Controllers;

use App\Libraries\Controller;
use App\Models\Users;

class Pages extends Controller
{
    public function __construct()
    {
        //empty func
    }

    public function index()
    {
        $data=array();
        $data=$this->model('Posts')::find('all', array('order' => 'publish_date desc'));
        $cat=$this->model('Category')::find('all');
        //print_r($cat);
        $this->view('pages/blog/header');
        $this->view('pages/blog/main', $data);
        $this->view('pages/blog/category', $cat);
        $this->view('pages/blog/footer');
    }
    public function singleBlog()
    {
        $post_id=(int)$_GET['id'];
        $post=$this->model('Posts')::find_by_post_id($post_id);
        $userName=$this->model('Users')::find_by_user_id($post->user_id);
        $category=$this->model('Category')::find_by_category_id($post->category_id);
        $cat=$this->model('Category')::find('all');
        $comments=$this->model('Comments')::all(array('conditions' => 'post_id = '.$post_id.''));
        
        $data['post']=array(
            'post_id'=>$post->post_id,
            'post_title'=>$post->post_title,
            'user_name'=>$userName->user_name,
            'category_name'=>$category->category_name,
            'post_description'=>$post->post_description,
            'post_topic'=>$post->post_topic,
            'publish_date'=>$post->publish_date,
            'post_content'=>$post->post_content
        );
        $data['comments']=array();
        foreach ($comments as $val) {
            $user_name=$this->model('Users')::find(array('select' => 'user_name'), array('conditions' => 'user_id = '.$val->user_id.''));
            array_push($data['comments'], array(
                'user_name'=>$user_name->user_name,
                'comment'=>$val->comment
            ));
        }
        $this->view('pages/blog/header');
        $this->view('pages/blog/singleBlog', $data);
        $this->view('pages/blog/category', $cat);
        $this->view('pages/blog/footer');
    }

    public function comment()
    {
        if (!isset($_SESSION['userdata'])) {
            header("location: /public/login/login");
        } else {
            $comment=array(
                'comment'=>$_POST['comment'],
                'user_id'=>$_SESSION['userdata']['user_id'],
                'post_id'=>$_GET['post_id'],
                'comment_date'=>date('y-m-d')
            );
            if ($this->model("Comments")::create($comment)) {
                header("Location: /public/pages/singleBlog&id=".$_GET['post_id']."");
            }
        }
    }

    public function blogbycategory()
    {
        $id=$_GET['catId'];
        $posts=$this->model('Posts')::find('all', array('conditions' => array('category_id=?', $id)));
        $cat=$this->model('Category')::find('all');
        $this->view('pages/blog/header');
        $this->view('pages/blog/blogbycategory', $posts);
        $this->view('pages/blog/category', $cat);
        $this->view('pages/blog/footer');
    }
    public function write()
    {
        if (!isset($_SESSION['userdata'])) {
            header("location: /public/login/login");
        }
        if ($_SESSION['userdata']['role']!='writer') {
            header("location: /public/");
        }
        $data=$this->model('Category')::find('all');
        $this->view('pages/blog/header');
        $this->view('pages/blog/write', $data);
        $this->view('pages/blog/footer');
        
        
    }
    public function postData()
    {
        $post = array();
        $post['post_id']=rand(100, 1000000000);
        $post['user_id']=$_SESSION['userdata']['user_id'];
        $post['category_id']=$_POST['catId'] ?? '';
        $post['post_title']=$_POST['blogTitle'] ?? '';
        $post['post_topic']=$_POST['blogTopic'] ?? '';
        $post['post_description']=$_POST['blogDescription'] ?? '';
        $post['review_date']=date("Y-m-d");
        $post['post_content']=$_POST['blogContent'] ?? '';
        if ($post['post_title']!='' && $post['post_title']!='' && $post['post_topic']!='' && $post['post_description']!='' && $post['review_date']!='' &&$post['post_content']!='') {
            $this->model("Posts")::create($post);
            $this->view('pages/blog/success');
        } else {
            echo "<p class='text-danger'>Fill all fields!</br>";
        }
        //$this->view('pages/register/register');
    }
    public function success()
    {
        $this->view('pages/blog/success');
    }
    public function login()
    {
        $loginData = $_POST ?? array();
        $loginData['userEmail']=$_POST['userEmail'] ?? '';
        $loginData['userPassword']=$_POST['userPassword'] ?? '';
        $user = $this->model('Users')::find_by_user_email_and_password($loginData['userEmail'], $loginData['userPassword']);
        
        if (isset($user)) {
            if ($user->permission == 'approved') {
                $_SESSION['userdata']=$_SESSION['userdata'] ?? array();
                $_SESSION['userdata'] = array(
                    'user_id'=>$user->user_id,
                    'user_name'=>$user->user_name,
                    'user_email'=>$user->user_email,
                    'permission'=>$user->permission,
                    'role'=>$user->role);
                    print_r($_SESSION['userdata']);

                if ($user->role=='admin') {
                    header("Location: /public/admin/dashboard&currentSection=users");
                } else {
                    header("Location: /public/");
                }
            } else {
                echo"<p class='text-danger'>Not authorised to login!</p>";
            }
        } else {
            echo"<p class='text-danger'>Wrong email or password</p>";
        }
        
        $this->view('pages/login/login');
    }
    public function register()
    {
        $signUpData = array();
        $signUpData['user_id']=rand(1000, 1000000000);
        $signUpData['user_name']=$_POST['userName'] ?? '';
        $signUpData['user_email']=$_POST['userEmail'] ?? '';
        $signUpData['password']=$_POST['userPassword'] ?? '';
        $userConfirmPassword=$_POST['userConfirmPassword'] ?? '';
        //print_r($signUpData);
        if ($signUpData['user_name']!='' && $signUpData['user_email']!='' && $signUpData['password']!='' && $userConfirmPassword!='' && ($signUpData['password']== $userConfirmPassword)) {
            if ($this->model('Users')::find_by_user_email($signUpData['user_email'])) {
                echo "<p class='text-danger'>User already exist with same email</br>";
            } else {
                if ($this->model("Users")::create($signUpData)) {
                    header("Location: /public/pages/login");
                }
            }
        } else {
            echo "<p class='text-danger'>Wrong input!</br>";
        }
        $this->view('pages/register/register');
    }
    public function logout()
    {
        session_unset();
        header("Location: /public/");
    }
}
