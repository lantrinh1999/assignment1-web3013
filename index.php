<?php
$url = isset($_GET['url']) ? $_GET['url'] : '/';
$baseUrl = "http://localhost:81/web3013/assignment1/";

require_once "./controllers/HomeController.php";
require_once "./controllers/ProductController.php";
require_once "./controllers/CategoryController.php";
require_once "./controllers/UserController.php";
switch($url){
    case '/':
        $ctr = new HomeController();
        echo $ctr->index();
        break;
    

/* Product*/     
    case 'product':
        $ctr = new ProductController();
        echo $ctr->index();
        break;    
    /* remove */
    case 'product-remove':
        $ctr = new ProductController();
        echo $ctr->remove();
        break;
    /*add*/
    case 'product-add':
        $ctr = new ProductController();
        echo $ctr->addForm();
        break;
    
    case 'product-save-add':
        $ctr = new ProductController();
        echo $ctr->saveAdd();
        break;
    /*edit*/
    case 'product-edit':
        $ctr = new ProductController();
        echo $ctr->editForm();
        break;

    case 'product-save-edit':
        $ctr = new ProductController();
        echo $ctr->saveEdit();
        break; 

/* Category*/     
    case 'category':
        $ctr = new CategoryController();
        echo $ctr->index();
        break;    
    /* remove */
    case 'category-remove':
        $ctr = new CategoryController();
        echo $ctr->remove();
        break;
    /*add*/
    case 'category-add':
        $ctr = new CategoryController();
        echo $ctr->addForm();
        break;
    
    case 'category-save-add':
        $ctr = new CategoryController();
        echo $ctr->saveAdd();
        break;
    /*edit*/
    case 'category-edit':
        $ctr = new CategoryController();
        echo $ctr->editForm();
        break;

    case 'category-save-edit':
        $ctr = new CategoryController();
        echo $ctr->saveEdit();
        break;  

/* User*/     
    case 'user':
        $ctr = new UserController();
        echo $ctr->index();
        break;    
    /* remove */
    case 'user-remove':
        $ctr = new UserController();
        echo $ctr->remove();
        break;
    /*add*/
    case 'user-add':
        $ctr = new UserController();
        echo $ctr->addForm();
        break;
    
    case 'user-save-add':
        $ctr = new UserController();
        echo $ctr->saveAdd();
        break;
    /*edit*/
    case 'user-edit':
        $ctr = new UserController();
        echo $ctr->editForm();
        break;

    case 'user-save-edit':
        $ctr = new UserController();
        echo $ctr->saveEdit();
        break;  






    default:
        echo "404 notfound!";
        break;

}

?>