<?php 
if (isset($_GET['error'])) {
	$error=$_GET['error'];
	echo "<div class='alert alert-danger'>
	<strong>Danger!</strong> $error :) :)
	</div>";
}else{}
?>

<?php 
require_once 'models/User.php';
// phần lấy ra cho vào phần lấy tác giả
$layProduct=User::all();
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
	<script>
		function showCustomer(str) {
			var xhttp;    
			if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			}
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", "ajaxthem.php?q="+str, true);
			xhttp.send();
		}
	</script>
</head>
<body>
	<div class="container">
		<!-- phần chia 2 cột theo chiều ngang -->
		<form action="them_submit.php" method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-5 col-md-6">
					<h2>Thêm Sản Phẩm</h2>
					<br>
					<br>
					<!-- form upload thông tin bảng product -->
					
					<div class="form-group">
						<label class="control-label col-sm-2">Tên</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="email" placeholder="EX: IPHONE 8" name="Name" required>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">Mô Tả</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" id="comment" name="detail" required></textarea>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">Hình ảnh đặc trưng</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" id="email" name="hinhanh" required>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">giá</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="email" placeholder="200000" name="price" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Tác giả</label>
						<div class="col-sm-4">
							<select class="form-control" id="sel1" name="created_by">
								<!-- vòng lặp lấy ra tác giả của product -->
								<?php foreach ($layProduct as $layallTacGia) { ?>
								<option value="<?=$layallTacGia->id ?>"><?=$layallTacGia->name ?></option>
								<?php } ?>
							</select>
						</div>
					</div>



					
				</div>
				<div class="col-sm-5 col-md-6">
					<!-- end producd -->

					<!-- upload gelly -->

					<h2>Phần upload Hình ảnh</h2>
					<br>
					chọn số ảnh muốn upload 
					<select name="gellery" onchange="showCustomer(this.value)" ><!-- phần chọn in ra số ảnh mà người dùng muốn upload -->
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<br>
					<br>

					<div class="form-group" id="txtHint">
						<label class="control-label col-sm-4">Hình ảnh</label>
						<div class="col-sm-6">
							<input type="file" class="form-control" value="1" name="img[]" required>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2"></label>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-default" name="ok_upload">Submit</button>
				</div>
			</div>



		</div>

	</form>
</div>
</body>
</html>