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
        $cates = User::all();
        include_once './views/user/addForm.php';
    }

    public function saveAdd(){
        $model = new User();
        $model->cate_name= $_POST['cate_name'];
        $model->desc= $_POST['desc'];

        
        $model->queryBuilder =  "insert into " . $model->table 
                    . " (cate_name, description)"
                    . " values "
                    . " ( 
                        '$model->cate_name',
                        '$model->desc'
                    )";
        $model->exeQuery();
        // var_dump($model);die;
        header('location: ./user');
        
    }


    public function editForm(){
        global $baseUrl;
        $id = $_GET['id'];
        $user = User::find($id);

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