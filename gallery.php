<?php 
include_once 'models/gallery.php';
$product=gallery::all();


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
  <strong>Success!</strong> Tạo Bài Viết Thành Công
</div>';
}else{}

 ?>
	<div class="container">
<h2>Lab3 ducbnph05034</h2>
   <div class="btn-group">
  <button type="button" class="btn btn-primary">Product</button>
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
        <th>title_product </th>
        <th>image</th>
        <th>image</th>

        <th><a href="them.php">Thêm gellery </a></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($product as $product1 ) { ?>
      <tr>
        <td><?= $product1->id ?></td>
        <td><?= $product1->title_product ?></td>
        <td><img src="image/<?= $product1->image_url ?>" class="img-thumbnail" alt="Cinque Terre" width="204" height="136"></td>
        <td><a href="sua.php?id=<?=$product1->id ?>">sửa</a>
        	<a href="xoa.php?id=<?=$product1->id ?>" onclick="return confirm_delete()">Xóa</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>



	</div>

</body>
</html>