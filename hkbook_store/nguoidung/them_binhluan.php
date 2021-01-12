<header>
 <link rel='stylesheet' href='../sweet/css.css'>
 <script src='../sweet/js.js'></script>
</header>
<?php include '../classes/khachhang.php'; ?>
<?php require_once '../helpers/format.php'; ?>
<?php
$kh = new khachhang();
$fm = new Format();
?>
<?php

if (isset($_POST['gui'])) {
    if ($_POST['id_sp'] != null && $_POST['id_kh'] != null && $_POST['noidung']!=NULL) {
        $id_sp = $_POST['id_sp'];
        $id_kh = $_POST['id_kh'];     
        $noidung = $_POST['noidung'];
        $time = date('y-m-d');
        $trangthai = '0';        
        $insert = $kh->comment($id_sp, $id_kh, $tieude, $noidung, $time, $trangthai);
        header("location:../chitiet.php?idsp=$id_sp");
    } else if($_POST['noidung']==NULL) {
         echo'<script>onload= function(){   
                swal("Bạn Chưa nhập nội dung bình luận!","","error")
                };
                </script>';
    }
    else{
        echo'<script>onload= function(){   
                swal("Bạn Chưa Đăng Nhập!","","error")
                };
                </script>'; 
    }
} else {

    echo'có lỗi xãy ra';
}
?>