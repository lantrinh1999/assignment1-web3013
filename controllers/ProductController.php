


<?php

require_once './models/Product.php';
require_once './models/Category.php';
require_once './models/Login.php';
class ProductController
{
    public function index(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        $products = Product::all();
        // echo "<pre>";

        // var_dump($products);die;
        include_once './views/admin/product/index.php';
    }


    public function remove(){
        $id = $_GET['id'];

        Product::delete($id);

        header('location: ./product');
    }

    public function addForm(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        $model = new Product();
        $cates = Category::all();
        $products = Product::all();
        include_once './views/admin/product/addForm.php';
    }

    public function editForm(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        $id = $_GET['id'];   
        $product = Product::find($id);
        $cates = Category::all();
        $products = Product::all();

        include_once './views/admin/product/editForm.php';
    }

    public function saveAdd(){
        $model = new Product();
        foreach($_POST as $key => $val){
            $model->{$key} = $val;
        }


        // validate
        $err = false;

        $namerr = "";
        $priceerr = "";
        $cateerr = "";
        $starerr = "";
        $viewerr = "";
        $short_descerr = "";
        $detailerr = "";

        if(strlen($model->name) == 0 ){
            $err = true;
            $nameerr = "Nhập tên sản phẩm!";
        } else if(strlen($model->name) > 191){
            $err = true;
            $nameerr = "Tên sản phẩm không vượt quá 191 ký tự!";
        }

        // check trùng tên
        $countProduct = Product::where('name', '=', "'" . $model->name . "'")->get();
        if(count($countProduct) > 0){
            $err = true;
            $nameerr = 'Tên sản phẩm "'. $model->name .'" đã tồn tại, hãy nhập tên khác!';
        }

        //kiem tra price
        if($model->price < 0 ){
            $err = true;
            $priceerr = "Giá sản phẩm phải là số nguyên dương!";
        } else if ($model->price == null || $model->price == ""  || empty($model->price)) {
            $err = true;
            $priceerr = "Mời nhập giá sản phẩm!";
        }
        // kiểm tra cate
        if (empty($model->cate_id) || $model->cate_id == null || $model->cate_id == "") {
            $err = true;
            $cateerr = "Mời chọn danh mục!";
        }
        //kiem tra star
        if (empty($model->star) || $model->star == null || $model->star < 0) {
            $err = true;
            $starerr = "Mời nhập đánh giá sao!";
        }
        //kiem tra view
        if (empty($model->views) || $model->views == null || $model->views < 0) {
            $err = true;
            $viewerr = "Mời nhập số lượt xem!";
        }
        if (empty($model->short_desc) || $model->short_desc == null) {
            $err = true;
            $short_descerr = "Mời nhập mô tả ngắn!";
        }
        if (empty($model->detail) || $model->detail == null) {
            $err = true;
            $detailerr = "Mời nhập chi tiết!";
        }





        $image = $_FILES['image'];
        // upload ảnh

        // upload ảnh and check

        if($image['size'] > 0){
            if ($image['type'] == "image/gif" OR $image['type'] == "image/png" OR $image['type'] == "image/jpeg"){

                $filename = "images/products/" . uniqid() . "-" . $image['name'];
                move_uploaded_file($image['tmp_name'], "public/" .$filename);
                $model->image = $filename; 

                } else {
                    $err=true;
                    $imageerr = "Mời chọn đúng định dạng hình ảnh";
                }
        } else {
            $imageerr = "Mời chọn hình ảnh!";
        }


                /* neu phat hien loi */
        if($err){
            header("location: ./product-add?nameerr=$nameerr&priceerr=$priceerr&cateerr=$cateerr&starerr=$starerr&viewerr=$viewerr&short_descerr=$short_descerr&detailerr=$detailerr&imageerr=$imageerr");
            die;
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
        header('location: ./product?success=true');
        
    }

    public function saveEdit(){
        $model = Product::find($_POST['id']);
        $id = $model->id;
        foreach($_POST as $key => $val){
            $model->{$key} = $val;
        }





        // validate
        $err = false;

        $namerr = "";
        $priceerr = "";
        $cateerr = "";
        $starerr = "";
        $viewerr = "";
        $short_descerr = "";
        $detailerr = "";
           $imageerr = "";        

        if(strlen($model->name) == 0 ){
            $err = true;
            $nameerr = "Nhập tên sản phẩm!";
        } else if(strlen($model->name) > 191){
            $err = true;
            $nameerr = "Tên sản phẩm không vượt quá 191 ký tự!";
        }

        // check trùng tên
        $countProduct = Product::where('name', '=', "'" . $model->name . "' and id != " . $id )->get();
        // var_dump($sqlname);die;
        if(count($countProduct) > 0){
            $err = true;
            $nameerr = 'Tên sản phẩm "'. $model->name .'" đã tồn tại, hãy nhập tên khác!';
        }

        //kiem tra price
        if($model->price < 0 ){
            $err = true;
            $priceerr = "Giá sản phẩm phải là số nguyên dương!";
        } else if ($model->price == null || $model->price == ""  || empty($model->price)) {
            $err = true;
            $priceerr = "Mời nhập giá sản phẩm!";
        }
        // kiểm tra cate
        if (empty($model->cate_id) || $model->cate_id == null || $model->cate_id == "") {
            $err = true;
            $cateerr = "Mời chọn danh mục!";
        }
        //kiem tra star
        if (empty($model->star) || $model->star == null || $model->star < 0) {
            $err = true;
            $starerr = "Mời nhập đánh giá sao!";
        }
        //kiem tra view
        if (empty($model->views) || $model->views == null || $model->views < 0) {
            $err = true;
            $viewerr = "Mời nhập số lượt xem!";
        }
        if (empty($model->short_desc) || $model->short_desc == null) {
            $err = true;
            $short_descerr = "Mời nhập mô tả ngắn!";
        }
        if (empty($model->detail) || $model->detail == null) {
            $err = true;
            $detailerr = "Mời nhập mô tả ngắn!";
        }






        $image = $_FILES['image'];
        // upload ảnh

        // upload ảnh and check


        if($image['size'] > 0){
            if ($image['type'] == "image/gif" OR $image['type'] == "image/png" OR $image['type'] == "image/jpeg"){

                $filename = "images/products/" . uniqid() . "-" . $image['name'];
                move_uploaded_file($image['tmp_name'], "public/" .$filename);
                $model->image = $filename; 

                } else {
                    $err=true;
                    $imageerr = "Mời chọn đúng định dạng hình ảnh";
                }
        }



                /* neu phat hien loi */
        if($err){
            header("location: ./product-edit?id=$id&&nameerr=$nameerr&priceerr=$priceerr&cateerr=$cateerr&starerr=$starerr&viewerr=$viewerr&short_descerr=$short_descerr&detailerr=$detailerr&imageerr=$imageerr");
            die;
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