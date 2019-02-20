<?php
require_once './models/User.php';
require_once './models/Login.php';


class LoginController
{

	    public function index(){

        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        // echo "<pre>";

        // var_dump($products);die;
        include_once './views/admin/login/index.php';
    }



    public function postLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ob = User::where('email', '=', "'" . $email . "'")->get();
        $user = $ob[0];
        $checkpass = password_verify (  $password , $user->password );
        if ($email == $user->email && $checkpass == true) {
            session_start();
            $_SESSION['login']['email'] = $user->email;
            $_SESSION['login']['password'] = $user->password;
            $_SESSION['login']['role'] = $user->role;
            $_SESSION['login']['id'] = $user->id;
            header('location: ./admin?success=true');

        } else{
            header('location: ./login?success=false');
        }

    }

    public function logout(){
        session_destroy();
        header('location: ./login');
    }


}

 ?>