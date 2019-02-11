<?php
require_once './models/BaseModel.php';
require_once './models/Category.php';
class User extends BaseModel
{
    public $table = 'users';

        public $cols = ['name', 'email', 'role', 'password'];


}



?>