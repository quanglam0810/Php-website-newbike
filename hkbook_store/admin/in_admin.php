<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">           
    <div class="box round first grid">  
        <?php
        ///new
        if(isset($_SESSION['ma_quyen']))
        {
            $ktquyen =$_SESSION['ma_quyen'];
        }
        else
        {
            $ktquyen='';
        }
        ///$ktquyen =$_SESSION['ma_quyen'];
        if($ktquyen!=1)
        {
            echo'<script>alert("Lỗi Quyền Truy Cập")</script>';           
            echo'<a href="index.php">VỀ TRANG ĐĂNG NHẬP</a>';
        }
        else
         {               
        ?>  
        <div class="block">  
            <?php
            $ten = $_SESSION['tenquyen'];
            if (isset($_GET['cva'])) {
                if ($_GET['cva'] == 1) {                   
                   include_once ('nhanvien/dsnhanvien.php');
                }
                if ($_GET['cva'] == 2) {
                    include_once ('nhanvien/themnv.php');
                }
                if ($_GET['cva'] == 3) {
                    include_once ('nhacc/add_ncc.php');
                }
                if ($_GET['cva'] == 4) {
                    include_once ('nhacc/ds_ncc.php');
                    
                }
                if ($_GET['cva'] == 5) {
                    include_once ('thongke/doanhthu.php');                   
                }
                if ($_GET['cva'] == 6) {
                    include_once ('thongke/phieunhap.php');
                  
                }
                if ($_GET['cva'] == 7) {
                    include_once ('thongke/phieuxuathang.php');
                   
                }
                 if ($_GET['cva'] == 8) {
                    include_once ('thongke/sanpham-kd.php');
                }
                if ($_GET['cva'] == 9) {
                    include_once ('thongke/chitietpn.php');
                }
                if ($_GET['cva'] == 10) {
                    include_once ('thongke/chitietpxuat.php');
                }
                 if ($_GET['cva'] ==11) {
                    include_once ('thongke/haha.php');
                }
                
            } else {
                echo"                                  
            <h1 style='margin-left: 30px;color:#004a80;'>Chào Mừng Đến Trang Quản Trị</h1>
            </br>          
            <h2 style='margin-left: 30px;'>Bạn đang đăng nhập với chức vụ :  $ten</h2>
        </div>
            ";
            }
            ?>
        </div>
    </div>
    <?php
         }?>
</div>
<?php include 'inc/footer.php'; ?>