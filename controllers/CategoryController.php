<?php 
require_once './models/Product.php';
require_once './models/Category.php';
class CategoryController
{
    public function index(){
        $categories = Category::all();
        // echo "<pre>";

        // var_dump($categorys);die;
        include_once './views/category/index.php';
    }


    public function remove(){
        $id = $_GET['id'];

        Category::delete($id);
        Category::deleteProduct($id);
        header('location: ./category');
    }

    public function addForm(){
        global $baseUrl;
        $model = new Category();
        $cates = Category::all();
        include_once './views/category/addForm.php';
    }

    public function saveAdd(){
        $model = new Category();
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
        header('location: ./category');
        
    }


    public function editForm(){
        global $baseUrl;
        $id = $_GET['id'];
        $category = Category::find($id);
        $cates = Category::all();
        include_once './views/category/editForm.php';
    }

    public function saveEdit(){
        $model = new Category();
        $model->id= $_POST['id'];
        $model->cate_name= $_POST['cate_name'];
        $model->desc= $_POST['desc'];


        $model->queryBuilder = "update " . $model->table . " 
            set
                        cate_name = '$model->cate_name',
                        
                        description = '$model->desc'
            where id = $model->id";
        
        $model->exeQuery();
        header('location: ./category');

    }

    



}   





 ?>