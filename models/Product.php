<?php
require_once './models/BaseModel.php';
require_once './models/Category.php';
class Product extends BaseModel
{
	
    public $table = 'products';

    public function getCate(){
        $cate = Category::where('id', '=', $this->cate_id)->get();
        return $cate[0];
    }
    
}



?>