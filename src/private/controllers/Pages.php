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
        echo("home page");
    }

    public function login()
    {
        $postdata = $_POST ?? array();
        
        // $user = $this->model('Users')::find_by_username('admin');

        // if ($user->user_id) {
        //     $_SESSION['userdata'] = array(
        //         'user_id'=>$user->user_id,
        //         'username'=>$user->username,
        //         'email'=>$user->email);
            
        //     header("Location: /public/admin/dashboard");
        // }

        $this->view('pages/login/header');
        $this->view('pages/login/main');
        $this->view('pages/login/footer');
    }

    public function register()
    {
        $this->view('pages/listUser');
    }
}
