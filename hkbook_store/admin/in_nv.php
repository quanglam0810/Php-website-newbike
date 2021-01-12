<?php include 'inc/header.php'; ?>
<?php include 'inc/menu_nv.php'; ?>
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
       // $ktquyen = $_SESSION['ma_quyen'];
        if ($ktquyen != 2) {
            echo'<script>alert("Lỗi Quyền Truy Cập")</script>';
            echo'<a href="index.php">VỀ TRANG ĐĂNG NHẬP</a>';
        } else {
            ?>
            <h2>Hiển Thị</h2>
            <div class="block">                          
            <?php
            $ten = $_SESSION['tenquyen'];
            if (isset($_GET['cv'])) {
                if ($_GET['cv'] == 1) {
                    include_once ('donhang/chuaxuli.php');
                }
                if ($_GET['cv'] == 2) {
                    include_once ('donhang/bihuydon.php');
                }
                if ($_GET['cv'] == 3) {
                    include_once ('binhluan/ds-binhluan.php');
                }
                if ($_GET['cv'] == 4) {
                    //include_once ('../nguoidung/thongtin.php');
                }
                if ($_GET['cv'] == 5) {
                    include_once ('thongke/banchay.php');
                }
                if ($_GET['cv'] == 6) {
                    //include_once ('../nguoidung/thongtin.php');
                }
                if ($_GET['cv'] == 7) {
                    //include_once ('../nguoidung/thongtin.php');
                }
            } else
            if (isset($_GET['ac'])) {
                include_once ('thongtin/thongtin.php');
            } else
            if (isset($_GET['ctd'])) {
                include_once ('donhang/ctdonhang.php');
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
                <?php }
            ?>
    </div>
            <?php include 'inc/footer.php'; ?>
          