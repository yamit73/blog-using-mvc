<?php
namespace App\Controllers;

use App\Libraries\Controller;

class Pages extends Controller
{
    public function __construct()
    {
        //empty func
    }

    public function index()
    {
        $this->view('pages/blog/header');
        $this->view('pages/blog/main');
        $this->view('pages/blog/footer');
    }
    public function singleBlog()
    {
        $this->view('pages/blog/header');
        $this->view('pages/blog/singleBlog');
        $this->view('pages/blog/footer');
    }
    public function write()
    {
        $this->view('pages/blog/header');
        $this->view('pages/blog/write');
        $this->view('pages/blog/footer');
    }
    public function login()
    {
        //$postdata = $_POST ?? array();
        
        // $user = $this->model('Users')::find_by_username('admin');

        // if ($user->user_id) {
        //     $_SESSION['userdata'] = array(
        //         'user_id'=>$user->user_id,
        //         'username'=>$user->username,
        //         'email'=>$user->email);
            
        //     header("Location: /public/admin/dashboard");
        // }

        $this->view('pages/login/login');
    }
    // public function dashboard()
    // {
    //     $this->view('pages/admin/dashboard/header');
    //     $this->view('pages/admin/dashboard/nav');
    //     $this->view('pages/admin/dashboard/header');
    //     $this->view('pages/admin/dashboard/footer');
    // }

    public function register()
    {
        $this->view('pages/register/register');
    }
}
