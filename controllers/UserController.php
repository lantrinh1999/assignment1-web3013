<?php 
require_once './models/Product.php';
require_once './models/User.php';
class UserController
{
    public function index(){
        $users = User::all();
        // echo "<pre>";

        // var_dump($users);die;
        include_once './views/user/index.php';
    }


    public function remove(){
        $id = $_GET['id'];

        User::delete($id);
        header('location: ./user');
    }

    public function addForm(){
        global $baseUrl;
        $model = new User();
        $users = User::all();
        $checkemail = "";
        foreach ($users as $u) {
            $checkemail .= '"' . $u->email . '", ';
        }
        $checkemail = rtrim($checkemail, ", ");
        // var_dump($checkemail);die;
        include_once './views/user/addForm.php';
    }

    public function saveAdd(){
        $model = new User();
        foreach($_POST as $key => $val){
            $model->{$key} = $val;
        }
        $model->password = password_hash($model->password, PASSWORD_DEFAULT);


        $colQuery = "";
        $valQuery = "";

        foreach($model->cols as $co){
            $colQuery .= "$co, ";
            $valQuery .= "'". $model->{$co} ."', ";
        }

        $colQuery = rtrim($colQuery, ", ");
        $valQuery = rtrim($valQuery, ", ");
        
        $model->queryBuilder =  "insert into " . $model->table 
                    . " ($colQuery)"
                    . " values "
                    . " ( $valQuery )";

        
        $model->exeQuery();
        // var_dump($model->queryBuilder);die;
        header('location: ./user');
        
    }


    public function editForm(){
        global $baseUrl;
        $id = $_GET['id'];
        $user = User::find($id);
        $checkemail = "";
        $users = User::all();        

        foreach ($users as $u) {
            if ($user->email !== $u->email) {
                $checkemail .= '"' . $u->email . '", ';
            }
        }

        $checkemail = rtrim($checkemail, ", ");
        // var_dump($checkemail);die;

        include_once './views/user/editForm.php';
    }

    public function saveEdit(){
        $model = new User();
        $model->id= $_POST['id'];
        $model->cate_name= $_POST['cate_name'];
        $model->desc= $_POST['desc'];


        $model->queryBuilder = "update " . $model->table . " 
            set
                        cate_name = '$model->cate_name',
                        
                        description = '$model->desc'
            where id = $model->id";
        
        $model->exeQuery();
        header('location: ./user');

    }

    



}   





 ?>