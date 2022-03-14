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
        $loginData = $_POST ?? array();
        $loginData['userEmail']=$_POST['userEmail'] ?? '';
        $loginData['userPassword']=$_POST['userPassword'] ?? '';
        $user = $this->model('Users')::find_by_user_email_and_password($loginData['userEmail'], $loginData['userPassword']);
        $_SESSION['userdata']=$_SESSION['userdata'] ?? array();
        if (isset($user)) {
            if ($user->user_id) {
                $_SESSION['userdata'] = array(
                    'user_id'=>$user->user_id,
                    'user_name'=>$user->user_name,
                    'user_email'=>$user->user_email,
                    'role'=>$user->role);
                    print_r($_SESSION['userdata']);
            }
            if ($user->role=='admin') {
                header("Location: /public/admin/dashboard");
            } else {
                header("Location: /public/");
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
        print_r($signUpData);
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
