<?php if (isset($_GET['iderror'])==true) {
  $notification['error']="Tài Khoản Đã Tồn Tại Trên Hệ Thống";
}else{} ?>
<?php 
require_once 'models/User.php';
if (isset($_GET['id'])|| isset($_GET['iderror'])) {
  $id = (isset($_GET['id']))==true ? $_GET['id'] : $_GET['iderror'] ;

$layuser=User::findOne($id);
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
</head>
<body>
    <div class="container">
      <!-- phần chia 2 cột theo chiều ngang -->
      <form action="sua_user.php?id=<?= $layuser->id?>" method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-5 col-md-6">
        <h2>Sửa Thông Tin</h2>
  <br>
  <br>
        <!-- form upload thông tin bảng product -->
    
    <div class="form-group">
        <label class="control-label col-sm-2">name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email"  name="name" value="<?=$layuser->name ?>" required>
        </div>
      </div>
 <input type="hidden" name="anhht" value="<?=$layuser->avatar ?>">

      <div class="form-group">
        <label class="control-label col-sm-2">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" value="<?=$layuser->email ?>" required>
          <?php if (isset($notification['error'])!=null) {
            echo '<i style="color:red">'.$notification['error'].'</i>';
          }else{} ?>
        </div>
      </div>


    
  </div>
  <div class="col-sm-5 col-md-6">
  <!-- end producd -->

  <!-- upload gelly -->

      <h2> ảnh đại diện</h2>
    
    <br>
    <br>
      <div class="form-group" id="txtHint">
        <label class="control-label col-sm-4">Hình ảnh</label>
        <div class="col-sm-6">
          <input type="file" class="form-control" value="1" name="avatar" >
          <img src="image/<?=$layuser->avatar ?>" class="img-thumbnail" alt="Cinque Terre" width="204" height="136">
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
</html>