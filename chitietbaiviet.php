<?php 
require_once 'models/Product.php';
require_once 'models/Gallery.php';
$id=$_GET['id'];
$laybaiviet=Product::findOne($id);
$layhinhanh=Gallery::where(['title_product',"$laybaiviet->name"]);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1><?= $laybaiviet->name?></h1>
  <p><?php //phần tieu de rut gon ?></p>
  <blockquote class="blockquote-reverse">
    <p><?= $laybaiviet->detail?></p>
    <b></b>
    <img src="image/<?= $laybaiviet->feature_image ?>" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
    <br>
    <b>Phần Gallery</b><br>
    <?php foreach ($layhinhanh as $layhinhanh1) {?>
    <img src="image/<?= $layhinhanh1->image_url ?>" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
    <?php } ?>
    <footer><?=$laybaiviet->LayTacGia()->name ?></footer>
  </blockquote>
</div>

</body>
</html>