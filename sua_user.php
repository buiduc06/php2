<?php 
require_once 'models/BaseModel.php';
require_once 'models/User.php';
$id = isset($_GET['id']) == true ? $_GET['id'] : null;
$mail =$_POST['email'];
$checkuser=User::sqlbullder(["SELECT * FROM users WHERE email='$mail' AND id != $id"]);

if ($checkuser!=null) {
	header("location: suauser.php?iderror=$id");
}else{

$name = isset($_POST['name']) == true ? $_POST['name'] : null;
$password = isset($_POST['password']) == true ? $_POST['password'] : null;
$email = isset($_POST['email']) == true ? $_POST['email'] : null;
$xulyanh1 = new BaseModel();
$xulyanh1->filename='avatar';
$xulyanh1->UploadAnh();
$xulyanh1->error;
if($id != null){
	$model = User::findOne($id);

}else{
	$model = new User();

}

// phần sử lý nếu người dùng sửa mà không chọn ảnh thì mặc định sẽ lấy ảnh cu
$anhmieuta = empty($_FILES['avatar']['name']) ? $_POST['anhht'] : $xulyanh1->imgupload ;

// phần gán giá trị vào cột
$model->name = $name;
$model->email = $email;
$model->password = md5($password);
$model->avatar = $anhmieuta;


// tiến hành import vào csdl

if(isset($model->id)){
	$model->update();
	header('location: user.php?update=suscces');
}else{
	$model->insert();

	header('location: user.php?create=suscces');
}

}

?>