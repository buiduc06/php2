<?php 
if (isset($_POST['ok_upload'])) {
	$notification=array();
	$notification['error']=null;
	require_once 'models/User.php';
	$mail=$_POST['email'];
	$checkuser=User::where(['email',"$mail"]);
	if ($checkuser != null) {
		$notification['error']="Tai khoan da ton tai tren he thong";
	}else{
		$gmail=$mail;
	}
if (isset($gmail)) {
$id = isset($_GET['id']) == true ? $_GET['id'] : null;
$name = isset($_POST['name']) == true ? $_POST['name'] : null;
$email = isset($_POST['email']) == true ? $gmail : null;
$password = isset($_POST['password']) == true ? $_POST['password'] : null;

$xulyanh1 = new BaseModel();
$xulyanh1->filename='avatar';
$xulyanh1->UploadAnh();
echo $xulyanh1->error;
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





}

 ?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Lab3|ducbph05034</title>
		<link rel="stylesheet" href="">
		<!-- bootstrap css -->
		<link rel="stylesheet" type="text/css" href="public/css/bootstrap/bootstrap.min.css">
		<!-- jquery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- bootstrap js -->
		<script src="public/js/bootstrap.min.js" type="text/javascript"></script>

		<!-- ajax in ra số ảnh mà người dùng muốn upload ảnh -->

	</head>
	<body>
		<div class="container">
			<!-- phần chia 2 cột theo chiều ngang -->
			<form action="themuser.php" method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-5 col-md-6">
				<h2>Thêm Tài Khoản</h2>
	<br>
	<br>
				<!-- form upload thông tin bảng product -->
		
		<div class="form-group">
	      <label class="control-label col-sm-2">name</label>
	      <div class="col-sm-10">
	        <input type="text" class="form-control" id="email"  name="name" required>
	      </div>
	    </div>
 

	    <div class="form-group">
	      <label class="control-label col-sm-2">Email</label>
	      <div class="col-sm-10">
	        <input type="email" class="form-control" id="email" name="email" required>
	        <?php if (isset($notification['error'])!=null) {
	        	echo $notification['error'];
	        }else{} ?>
	      </div>
	    </div>


	    <div class="form-group">
	      <label class="control-label col-sm-2">Password</label>
	      <div class="col-sm-10">
	        <input type="password" class="form-control" id="email" name="password" required>
	      </div>
	    </div>


	 



		
	</div>
	<div class="col-sm-5 col-md-6">
	<!-- end producd -->

	<!-- upload gelly -->

			<h2>Phần upload ảnh đại diện</h2>
		
		<br>
		<br>
	    <div class="form-group" id="txtHint">
	      <label class="control-label col-sm-4">Hình ảnh</label>
	      <div class="col-sm-6">
	        <input type="file" class="form-control" value="1" name="avatar" >
	      </div>
	    </div>
	</div>
	</div>
		<div class="form-group">
			<label class="control-label col-sm-2"></label>
	      <div class="col-sm-10">
			<button type="submit" class="btn btn-default" name="ok_upload" >Submit</button>
		</div>
		</div>



		</div>

	</form>
	</div>
	</body>
	</html>