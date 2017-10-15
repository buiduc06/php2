<?php 
require_once 'models/BaseModel.php';
require_once 'models/Product.php';
require_once 'models/User.php';
require_once 'models/Gallery.php';
if (isset($_GET['id'])==true) {
	$id=$_GET['id'];
$xoabai=new Product();
$xoabai2=new Gallery();
$xoabai3=Product::findOne($id);
$xoabai2->delete2(['title_product',"$xoabai3->name"]);// xóa tất ganlly truoc
$xoabai->id=$id;
$xoabai->delete();// xoa product
header('location: index.php');
}
elseif (isset($_GET['idgallry'])==true) {
	$id=$_GET['idgallry'];
	$laygally=Gallery::findOne($id);
	$layproducid=Product::where(['name',"$laygally->title_product"]);
	foreach ($layproducid as $layproducid1) {
	}

$xoabai=new gallery();
$xoabai->id=$id;
$xoabai->delete();
header("location: sua.php?id=$layproducid1->id ");
}
else{
	$id=$_GET['idus'];
	$xoabai=new User();
	$xoabai1=new Product();
	$xoabai2=new Gallery();
	$xoabai5=Product::where(['created_by',"$id"]);// lấy tất cả dữ liệu của thành viên này ra
// xóa dữ liệu do thành viên này tạo trước
foreach ($xoabai5 as $xoabai4) {// mở vòng lặp và tiến hành xóa tất cả dữ liệu do thành viên này tạo ra
	
$xoabai2->delete2(['title_product',"$xoabai4->name"]);// xóa tất ganlly truoc
$xoabai1->id=$xoabai4->id;
$xoabai1->delete();// xoa product

}
// xóa thành viên
$xoabai->id=$id;
$xoabai->delete();



header('location: User.php');

}

 ?>