<?php
require_once 'models/Gallery.php';
require_once 'models/BaseModel.php';
require_once 'models/product.php';

$id = isset($_GET['id']) == true ? $_GET['id'] : null;
$Name = isset($_POST['Name']) == true ? $_POST['Name'] : null;
$detail = isset($_POST['detail']) == true ? $_POST['detail'] : null;
$price = isset($_POST['price']) == true ? $_POST['price'] : null;
$createdBy = isset($_POST['created_by']) == true ? $_POST['created_by'] : '1';


// phần upload hình ảnh vào gellery
if (isset($_FILES['img']['name'])) {
 $num=count($_FILES['img']['name']);//đếm số ảnh mà người dùng đã thêm vào gán cho $num

 //mở vòng lặp và tiến hành cho tất cả các dữ liệu vào db
 for($i=0; $i< $num; $i++)
 {
            //nếu không gặp lỗi thì tiến hanhf insert vào db
    $xxanh=new BaseModel();
    $xxanh->namefile="img";
    $xxanh->i=$i;
    $xxanh->UploadAnhs2();


    if (isset($xxanh->anhuploads)!=null) {
        $model2 = new Gallery();
        $model2->image_url =  $xxanh->anhuploads;
        $model2->title_product = $Name;
        $model2->insert();   
    }else{}

}
}
// phần upload hình ảnh +validateform vào product
$xulyanh =new BaseModel();
$xulyanh->filename='hinhanh';
$xulyanh->UploadAnh();
// phần check xem hình ảnh có lỗi không nếu có lỗi thì dừng lại và trở về và in ra thông báo lo

if (isset($xulyanh->error)!=null || isset($xxanh->error)!=null ) {
    if (isset($xulyanh->error) !== NULL) {
        if ($id !=null ) {
           header("location: sua.php?iderror=$id");
       }if($id ==null){
         header("location: them.php?error=$xulyanh->error");
     }
 }

 if (isset($xxanh->error)!== NULL) {
    if ($id !=null ) {
       header("location: sua.php?iderror=$id");
   }if($id ==null){
     header("location: them.php?error=$xxanh->error");
 }
}
}else{
    if($id != null){
        $model = Product::findOne($id);
        
    }else{
        $model = new Product();

    }
// phần sử lý nếu người dùng sửa mà không chọn ảnh thì mặc định sẽ lấy ảnh cu
    $anhmieuta = empty($_FILES['hinhanh']['name']) ? $_POST['anhht'] : $xulyanh->imgupload ;

// phần gán giá trị vào cột
    $model->name = $Name;
    $model->detail = $detail;
    $model->sell_price = $price;
    $model->created_by = $createdBy;
    $model->feature_image = $anhmieuta;


// tiến hành import vào csdl

    if(isset($model->id)){
        $model->update();
        header('location: index.php?update=suscces');
    }else{
        $model->insert();
        
        header('location: index.php?create=suscces');
    }

}


?>