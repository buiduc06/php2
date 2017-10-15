<?php 
require_once 'BaseModel.php';
/**
* 
*/
class Gallery extends BaseModel
{
	
	public $tableName ="gallery";
	public $columns = ['image_url','title_product'];
}

 ?>