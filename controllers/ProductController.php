


<?php

require_once './models/Product.php';
require_once './models/Category.php';
class ProductController
{
    public function index(){
        global $baseUrl;  
        $products = Product::all();
        // echo "<pre>";

        // var_dump($products);die;
        include_once './views/product/index.php';
    }


    public function remove(){
        $id = $_GET['id'];

        Product::delete($id);

        header('location: ./product');
    }

    public function addForm(){
        global $baseUrl;
        $model = new Product();
        $cates = Category::all();
        $products = Product::all();
        $checkname = "";
        foreach ($products as $p) {
            $checkname .= '"' . $p->name . '", ';
        }
        $checkname = rtrim($checkname, ", ");
        include_once './views/product/addForm.php';
    }

    public function editForm(){
        global $baseUrl;
        $id = $_GET['id'];   
        $product = Product::find($id);
        $cates = Category::all();

        $products = Product::all();
        $checkname = "";
        foreach ($products as $p) {
            if ($product->name !== $p->name) {
                $checkname .= '"' . $p->name . '", ';
            }
        }
        $checkname = rtrim($checkname, ", ");

        include_once './views/product/editForm.php';
    }

    public function saveAdd(){
        $model = new Product();
        foreach($_POST as $key => $val){
            $model->{$key} = $val;
        }
        $image = $_FILES['image'];
        // upload ảnh
        if($image['size'] > 0){
            $filename = "images/products/" . uniqid() . "-" . $image['name'];
            move_uploaded_file($image['tmp_name'], "public/" .$filename);
            $model->image = $filename;
        }
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

        // var_dump($model->queryBuilder);die;
        $model->exeQuery();
        header('location: ./product');
        
    }

    public function saveEdit(){
        $model = Product::find($_POST['id']);
        foreach($_POST as $key => $val){
            $model->{$key} = $val;
        }

        $image = $_FILES['image'];
        // upload ảnh
        if($image['size'] > 0){
            $filename = "images/products/" . uniqid() . "-" . $image['name'];
            move_uploaded_file($image['tmp_name'], "public/" .$filename);
            $model->image = $filename;
        }

        
        $setQuery = "";
        foreach($model->cols as $co){
            $setQuery .= $co . " = '" . $model->{$co} . "', ";
        }
        $setQuery = rtrim($setQuery, ", ");

        $model->queryBuilder =  "update " . $model->table 
                    . " set $setQuery"
                    . " where id = " . $model->id;
        $model->exeQuery();
        header('location: ./product');
        
    }
    
}



?>