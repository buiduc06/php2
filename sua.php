<?php 
if (isset($_GET['iderror'])) {
	echo '<div class="alert alert-danger">
	<strong>Danger!</strong> Upload ảnh Bị lỗi vui lòng kiểm tra lại định dạng hoặc kích thước của file
	</div>';
}else{}


?>

<?php 
if ( isset($_GET['id']) || isset($_GET['iderror'])) {//check xem nguoi dung da sd truong hop nao
	require_once 'models/Product.php';
	require_once 'models/User.php';
	require_once 'models/Gallery.php';
	require_once 'models/BaseModel.php';
$id = (isset($_GET['id'])) ? $_GET['id'] : $_GET['iderror'] ;//check xem có rơi vào trường hợp refun lỗi ko

$layProduct=Product::findOne("$id");
$layallTacGia=User::where(['id','!=',"$layProduct->created_by"]);// lâty ra tất cả tác giả điều kiện khac tac gia cu
$lay1TacGia=User::where(['id',"$layProduct->created_by"]);
$layGellery=Gallery::where(['title_product',"$layProduct->name"]);
}else{
	echo '
	<div class="alert alert-warning">
	<strong>Warning!</strong> Không Tìm Thấy Id
	</div>';
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
		<form action="them_submit.php?id=<?=$layProduct->id ?>" method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-5 col-md-6">
					<h2>Sửa Sản Phẩm</h2>
					<br>
					<br>
					<!-- form upload thông tin bảng product -->
					
					<div class="form-group">
						<label class="control-label col-sm-2">Tên</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="email" value="<?=$layProduct->name ?>" name="Name" >
							<!-- input ẩn truyền title qua post  -->
							<input type="hidden" name="title_product" value="<?=$layProduct->name ?>" >
							<input type="hidden" name="anhtgelly" value="<?=$layProduct->image_url ?>" >
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">Mô Tả</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" id="comment" name="detail"><?=$layProduct->detail ?></textarea>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">Hình ảnh đặc trưng</label>
						<div class="col-sm-10">
							<input type="file" class="form-control"  name="hinhanh" >
							<input type="hidden" name="anhht" value="<?=$layProduct->feature_image ?>">
							<img src="image/<?=$layProduct->feature_image ?>" class="img-thumbnail" alt="Cinque Terre" width="204" height="136">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">giá</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="email" value="<?=$layProduct->sell_price ?>" name="price" >
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-2">Tác giả</label>
						<div class="col-sm-4">
							<select class="form-control" id="sel1" name="created_by">
								<!-- vòng lặp lấy ra tác giả của product -->
								<?php foreach ($lay1TacGia as $lay1TacGia1 ) { ?>
								<option value="<?=$lay1TacGia1->id ?>"><?=$lay1TacGia1->name ?></option>
								<?php } ?>

								<!-- lấy ra tất cả tác giả với điều kiện trừ bỏ tác giả cũ -->
								<?php foreach ($layallTacGia as $layallTacGia) { ?>
								<option value="<?=$layallTacGia->id ?>"><?=$layallTacGia->name ?></option>
								<?php } ?>
							</select>
						</div>
					</div>



					
				</div>

				<div class="col-sm-5 col-md-6">
					<!-- end producd -->

					<!-- upload gelly -->

					<h2>Thư Viện ảnh</h2>
					<br>
					<!-- phần check xem người dùng có hình ảnh hay không -->
					<?php foreach ($layGellery as $layGellery1){}
					if (isset($layGellery1->id)==null) { ?>

					<div class="col-sm-5 col-md-12">
					<!-- end producd -->

					<!-- upload gelly -->
					<h4>bạn chưa có hình ảnh nào vui lòng upload 1 ảnh</h4>
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
							<input type="file" class="form-control" value="1" name="img[]" >
						</div>
					</div>
				</div>
			</div>

					<?php }else{ ?>


					<div class="row">
						<div class="col-sm-10"><h5></h5></div>
						<?php $id=0; foreach ($layGellery as $layGellery1 ) {
							$id++;
							?>	
							<div class="col-sm-6 col-md-">
								<div class="form-group" id="txtHint">

									<label class="control-label col-sm-4">Hình <?php echo $id; ?></label>
									<div class="col-sm-8">
										<img src="image/<?=$layGellery1->image_url ?>" class="img-thumbnail" alt="Cinque Terre" style="width:204px;height:136px">
										<button type="button" class="btn btn-danger" name="ok_upload"><a href="xoa.php?idgallry=<?=$layGellery1->id ?>" style="color:white;">Xóa</a> </button>
										<!-- chuyền id của gelly qua để update -->
										<input type="hidden" name="gellyid" value="<?=$layGellery1->id ?>">
									</div>


								</div>

							</div>
							<?php } ?>
							<!-- phan upload them hinh anh neu nguoi dung can -->
							<div class="col-sm-5 col-md-12">
								<label class="control-label col-sm-2">Thêm Hình </label>
								<div class="col-sm-8">
									<input type="file" class="form-control" value="1" name="img[]">
								</div>
							</div>
						</div> 

	<?php }//đóng else của check ng dùng ?>

					</div>
				</div>


				<div class="form-group">
					<label class="control-label col-sm-2"></label>
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary" name="ok_upload">Submit</button>
					</div>
				</div>



			</div>

		</form>
	</div>
</body>
</html>