<?php

require_once './models/Product.php';
require_once './models/Category.php';
class ProductController
{
    public function index(){
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
        include_once './views/product/addForm.php';
    }

    public function saveAdd(){
        $model = new Product();
        $model->name= $_POST['name'];
        $model->cate_id= $_POST['cate_id'];
        $model->price= $_POST['price'];
        $model->star= $_POST['star'];
        $model->views= $_POST['views'];
        $model->short_desc= $_POST['short_desc'];
        $model->detail= $_POST['detail'];
        $image = $_FILES['image'];
        // upload ảnh
        if($image['size'] > 0){
            $filename = "images/products/" . uniqid() . "-" . $image['name'];
            move_uploaded_file($image['tmp_name'], "public/" .$filename);
            $model->image = $filename;
        }
        
        $model->queryBuilder =  "insert into " . $model->table 
                    . " (name, cate_id, price, star, views, short_desc, detail, image)"
                    . " values "
                    . " ( 
                        '$model->name',
                        '$model->cate_id',
                        '$model->price',
                        '$model->star',
                        '$model->views',
                        '$model->short_desc',
                        '$model->detail',
                        '$model->image'
                    )";
        $model->exeQuery();
        header('location: ./product');
        
    }


    public function editForm(){
        global $baseUrl;
        $id = $_GET['id'];
        $product = Product::find($id);
        $cates = Category::all();
        include_once './views/product/editForm.php';
    }

    public function saveEdit(){
        $model = new Product();
        $model->id= $_POST['id'];
        $model->name= $_POST['name'];
        $model->cate_id= $_POST['cate_id'];
        $model->price= $_POST['price'];
        $model->star= $_POST['star'];
        $model->views= $_POST['views'];
        $model->short_desc= $_POST['short_desc'];
        $model->detail= $_POST['detail'];
        $image = $_FILES['image'];
        // upload ảnh
        if($image['size'] > 0){
            $filename = "images/products/" . uniqid() . "-" . $image['name'];
            move_uploaded_file($image['tmp_name'], "public/" .$filename);
            $model->image = $filename;
        }
        
        $model->queryBuilder = "update " . $model->table . " 
            set
                        name = '$model->name',
                        cate_id = '$model->cate_id',
                        price = '$model->price',
                        star = '$model->star',
                        views = '$model->views',
                        short_desc = '$model->short_desc',
                        detail = '$model->detail',
                        image = '$model->image'
            where id = $model->id";
        
        $model->exeQuery();
        // var_dump($model);die;
        header('location: ./product');

    }

    
}



?>