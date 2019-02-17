<?php
require_once './models/BaseModel.php';
require_once './models/Login.php';
class Category extends BaseModel
{
    public $table = 'categories';
    
    public function deleteProduct($id)
    {
        $model = new static();
        $sqlQuery = "delete from products where cate_id = $id";
        $stmt = $model->connect->prepare($sqlQuery);
        $stmt->execute();
        return true;
    }
}
?>