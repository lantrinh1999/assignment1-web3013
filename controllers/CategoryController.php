<?php 
require_once './models/Product.php';
require_once './models/Category.php';
require_once './models/Login.php';
class CategoryController
{
    public function index(){
                global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        Login::checkLogin(300);
        $categories = Category::all();
        // echo "<pre>";

        // var_dump($categorys);die;
        include_once './views/admin/category/index.php';
    }


    public function remove(){
        Login::checkLogin(300);
        $id = $_GET['id'];
        Category::delete($id);
        Category::deleteProduct($id);
        header('location: ./category');
    }

    public function addForm(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        Login::checkLogin(300);
        $model = new Category();
        $cates = Category::all();       
        include_once './views/admin/category/addForm.php';
    }

    public function saveAdd(){
        Login::checkLogin(300);
        $model = new Category();
        $model->cate_name= $_POST['cate_name'];
        $model->description= $_POST['desc'];


        //check lỗi
        $err = false;

        $nameerr = "";
        $descerr = "";


        if(strlen($model->cate_name) == 0 ){
            $err = true;
            $nameerr = "Nhập tên danh mục !";
        } else if(strlen($model->cate_name) > 191){
            $err = true;
            $nameerr = "Tên danh mục không vượt quá 191 ký tự!";
        }

        $countCategory = Category::where('cate_name', '=', "'" . $model->cate_name . "'")->get();

        if(count($countCategory) > 0){
            $err = true;
            $nameerr = 'Tên danh mục "'. $model->cate_name .'" đã tồn tại, hãy nhập tên khác!';
        }
        if (empty($model->description) || $model->description == null) {
            $err = true;
            $descerr = "Mời nhập mô tả!";
        }
      
        if($err){
            header("location: ./category-add?nameerr=$nameerr&descerr=$descerr");
            die;
        }

        $model->queryBuilder =  "insert into " . $model->table 
                    . " (cate_name, description)"
                    . " values "
                    . " ( 
                        '$model->cate_name',
                        '$model->description'
                    )";
        $model->exeQuery();
        // var_dump($model);die;
        header('location: ./category?success=true');
        
    }


    public function editForm(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        Login::checkLogin(300);
        $id = $_GET['id'];
        $category = Category::find($id);
        $cates = Category::all();
          
        include_once './views/admin/category/editForm.php';
    }

    public function saveEdit(){
        Login::checkLogin(300);
        $model = new Category();
        $id = $_POST['id'];
        $model->id= $_POST['id'];
        $model->cate_name= $_POST['cate_name'];
        $model->description = $_POST['desc'];

        $err = false;

        $nameerr = "";
        $descerr = "";


        if(strlen($model->cate_name) == 0 ){
            $err = true;
            $nameerr = "Nhập tên danh mục !";
        } else if(strlen($model->cate_name) > 191){
            $err = true;
            $nameerr = "Tên danh mục không vượt quá 191 ký tự!";
        }

        $countCategory = Category::where('cate_name', '=', "'" . $model->cate_name . "' and id != " . $id )->get();

        if(count($countCategory) > 0){
            $err = true;
            $nameerr = 'Tên danh mục "'. $model->cate_name .'" đã tồn tại, hãy nhập tên khác!';
        }
        if (empty($model->description) || $model->description == null) {
            $err = true;
            $descerr = "Mời nhập mô tả!";
        }
      
        if($err){
            header("location: ./category-edit?id=$id&&nameerr=$nameerr&descerr=$descerr");
            die;
        }



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