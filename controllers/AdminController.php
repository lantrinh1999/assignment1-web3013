<?php 
require_once './models/BaseModel.php';
require_once './models/Category.php';
require_once './models/Product.php';
require_once './models/User.php';
require_once './models/Admin.php';
require_once './models/Login.php';


/**
 * 
 */
class AdminController
{
	public function index(){
		global $baseUrl;
		global $adminUrl;
		global $adminAssetUrl;
		$category = Category::all();
		$product = Product::all();
		$user = User::all();
		$count_Product = Product::count();
		$count_Category = Category::count();
		$count_User = User::count();

		include_once './views/admin/index.php';

	}
}

 ?>