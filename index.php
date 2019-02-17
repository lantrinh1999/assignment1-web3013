<?php

$url = isset($_GET['url']) ? $_GET['url'] : '/';
$baseUrl = "http://localhost:81/web3013/assignment1/";
$adminUrl = "http://localhost:81/web3013/assignment1/views/admin";
$adminAssetUrl = "http://localhost:81/web3013/assignment1/views/admin/adminlte/";

require_once "./controllers/HomeController.php";
require_once "./controllers/ProductController.php";
require_once "./controllers/CategoryController.php";
require_once "./controllers/UserController.php";
require_once "./controllers/AdminController.php";
require_once "./controllers/LoginController.php";

switch($url){
    case '/':
        $ctr = new HomeController();
        echo $ctr->index();
        break;
    
/* admin */
    case 'admin':
        $ctr = new AdminController();
        echo $ctr->index();
        break;
/* Product*/     
    case 'admin/product':
        $ctr = new ProductController();
        echo $ctr->index();
        break;    
    /* remove */
    case 'admin/product-remove':
        $ctr = new ProductController();
        echo $ctr->remove();
        break;
    /*add*/
    case 'admin/product-add':
        $ctr = new ProductController();
        echo $ctr->addForm();
        break;
    
    case 'admin/product-save-add':
        $ctr = new ProductController();
        echo $ctr->saveAdd();
        break;
    /*edit*/
    case 'admin/product-edit':
        $ctr = new ProductController();
        echo $ctr->editForm();
        break;

    case 'admin/product-save-edit':
        $ctr = new ProductController();
        echo $ctr->saveEdit();
        break; 

/* Category*/     
    case 'admin/category':
        $ctr = new CategoryController();
        echo $ctr->index();
        break;    
    /* remove */
    case 'admin/category-remove':
        $ctr = new CategoryController();
        echo $ctr->remove();
        break;
    /*add*/
    case 'admin/category-add':
        $ctr = new CategoryController();
        echo $ctr->addForm();
        break;
    
    case 'admin/category-save-add':
        $ctr = new CategoryController();
        echo $ctr->saveAdd();
        break;
    /*edit*/
    case 'admin/category-edit':
        $ctr = new CategoryController();
        echo $ctr->editForm();
        break;

    case 'admin/category-save-edit':
        $ctr = new CategoryController();
        echo $ctr->saveEdit();
        break;  

/* User*/     
    case 'admin/user':
        $ctr = new UserController();
        echo $ctr->index();
        break;    
    /* remove */
    case 'admin/user-remove':
        $ctr = new UserController();
        echo $ctr->remove();
        break;
    /*add*/
    case 'admin/user-add':
        $ctr = new UserController();
        echo $ctr->addForm();
        break;
    
    case 'admin/user-save-add':
        $ctr = new UserController();
        echo $ctr->saveAdd();
        break;
    /*edit*/
    case 'admin/user-edit':
        $ctr = new UserController();
        echo $ctr->editForm();
        break;

    case 'admin/user-save-edit':
        $ctr = new UserController();
        echo $ctr->saveEdit();
        break;  

    case 'login':
        $ctr = new LoginController();
        echo $ctr->index();
        break;  

    case 'post-login':
        $ctr = new LoginController();
        echo $ctr->postLogin();
        break;    



    default:
        echo "404 notfound!";
        break;

}

?>