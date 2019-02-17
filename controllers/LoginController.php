<?php
require_once './models/User.php';
require_once './models/Login.php';
/**
 * 
 */
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
		$user = User::all();
		$model = new Login();

        foreach($_POST as $key => $val){
            $model->{$key} = $val;
        }

        $user = User::where2('email',$model->email);
        // var_dump($user->password);die;
        $err = false;
        if ($user->email == $model->email) {
        	if (password_verify($model->password, $user->password)) {
        		$_SESSION['login'] = $user;

        		header('location: ' . $baseUrl . 'admin');

        	} else{
        		header('location: ' . $baseUrl . 'login?msg=errorpass');
        		die;
        	}
        } else{
        		header('location: ' . $baseUrl . 'login?msg=error');
        		die;
        }
	}


}

 ?>