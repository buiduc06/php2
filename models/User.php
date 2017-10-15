<?php 
require_once 'BaseModel.php';
require_once 'product.php';


/**
* 
*/
class User extends BaseModel
{
	
	public $tableName="users";
	public $columns =['name','email','password','avatar'];
}
 ?>