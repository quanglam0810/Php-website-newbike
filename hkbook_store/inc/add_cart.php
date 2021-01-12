<header>  
    <link rel='stylesheet' href='sweet/css.css'>
    <script src='sweet/js.js'></script>
</header>
<?php
include 'classes/giohang.php';
include 'classes/product.php';
$giohang = new giohang();
$product = new product();
session_start();
?>
<?php
if (isset($_POST['add']) == 'add') {    
    $product_id = $_POST['id'];
    $product_qty = $_POST['slg'];
    }                     
    // kiểm tra số lượng có hợp lệ
    $kt = $product->get_details($product_id);
         while ($result = $kt->fetch_assoc()) {
            $slgcon = $result['SoluongCon'];
            $tensp = $result['TenSP'];
            $hinh = $result['Hinh'];
            $giaban = $result['DonGia'];
}
         if($product_qty > $slgcon){
             echo'hết hàng';
         }
         else {
             $add_luon = $giohang->add_cart_emty($tensp, $hinh, $product_id, $product_qty, $giaban);
    // code-----
         // nếu ko báo lôi
         // nếu có gọi kiểm tra có sp trong giỏ hàng chưa
         // nếu có báo lỗi
         // nếu chưa gọi hàm add
            // kiểm tra có tồn tại giỏ hàng chưa
                //nếu chưa add new_item
                //nếu có add-item 
            
         }
?>