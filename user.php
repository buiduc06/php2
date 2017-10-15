<?php 
include_once 'models/product.php';
include_once 'models/User.php';
$product=User::all();


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
  <script type="text/javascript">
  //doan script yeu cau xac minh khi delete - ducdeveloper
    function confirm_delete() {
    if (confirm("bạn có chắc chắn muốn xóa?")) {
        return true;
    } else {
        return false;
    }
}
  </script>
</head>
<body>
	<?php 
// phần in ra thông báo tạo hoặc update dữ liệu thành công
  if (isset($_GET['update'])) {
  echo '<div class="alert alert-info">
  <strong>info!</strong> Update Thông Tin Thành Công
</div>';
}else{}
if (isset($_GET['create'])) {
  echo '<div class="alert alert-success">
  <strong>Success!</strong> Tạo Tai khoan Thành Công
</div>';
}else{}

 ?>
	<div class="container">
<h2>Lab3 ducbnph05034</h2>
   <div class="btn-group">
  <button type="button" class="btn btn-primary">User</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="index.php">Product</a></li>
    <li><a href="user.php">user</a></li>
    <li><a href="gallery.php">gallery</a></li>
  </ul>
</div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>name</th>
        <th>email</th>
        <th>avatar</th>
        <th>Số Sản Phẩm </th>
        <th><a href="themuser.php">Thêm Tài Khoản</a></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($product as $product1 ) { ?>
     <?php $sosp=Product::sqlbullder(["SELECT count(id) AS sobai1 FROM products WHERE created_by=$product1->id"]);foreach ($sosp as $sosp1 ) {
      ?>
      <tr>
        <td><?= $product1->id ?></td>
        <td><?= $product1->name ?></td>
        <td><?= $product1->email ?></td>
        <?php $product1->avatar  = ($product1->avatar)!= null ? $product1->avatar : 'no-avatar.jpg' ; ?>
          <td><img src="image/<?= $product1->avatar ?>" class="img-thumbnail" alt="Cinque Terre" width="204" height="136"></td>

          <input type="hidden" name="anhht" value="<?= $product1->avatar ?>">
         
        <td><?= $sosp1->sobai1 ?></td>
       
        <td><a href="suauser.php?id=<?=$product1->id ?>">sửa</a>
        	<a href="xoa.php?idus=<?=$product1->id ?>" onclick="return confirm_delete()">Xóa</a></td>
      </tr>
       <?php } ?>
      <?php } ?>
    </tbody>
  </table>



	</div>

</body>
</html>