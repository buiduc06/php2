<?php 
include_once 'models/Product.php';
$product=Product::all();


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
  
	<div class="container">
<h2>Lab3 ducbnph05034</h2>
   
  <table class="table table-striped">
    



	</div>

</body>
</html>