<?php 

/**
* 
*/
include_once 'BaseModel.php';
include_once 'User.php';
class Product extends BaseModel
{
	
	public $tableName="products";
	public $columns = ['name', 'detail', 'feature_image', 'sell_price', 'list_price', 'created_by'];
	 function LayTacGia(){
	 	$gettacgia=user::findOne($this->created_by);
	 	return $gettacgia;
	 }
}

 ?>