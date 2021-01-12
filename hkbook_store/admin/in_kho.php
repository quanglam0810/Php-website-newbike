<?php include 'inc/header.php'; ?>
<?php include 'inc/menu_kho.php'; ?>
<div class="grid_10">           
    <div class="box round first grid">  
        <?php
        /// new
        if(isset($_SESSION['ma_quyen']))
        {
            $ktquyen =$_SESSION['ma_quyen'];
        }
        else
        {
            $ktquyen='';
        }
        //$ktquyen =$_SESSION['ma_quyen'];
        if($ktquyen!=3)
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
            if (isset($_GET['cvk'])) {
                if ($_GET['cvk'] == 1) {
                    include_once ('donhang/daduyet.php');                 
                }
                if ($_GET['cvk'] == 2) {
                    include_once ('donhang/danggiao.php'); 
                }
                if ($_GET['cvk'] == 3) {
                   include_once ('donhang/giaothatbai.php');                 
                }
                if ($_GET['cvk'] == 4) {
                       
                      include_once ('donhang/giaotc.php');
                }
                if ($_GET['cvk'] == 5) {
                    include_once ('danhmuc/themdm.php');
                   
                }
                if ($_GET['cvk'] == 6) {
                    include_once ('danhmuc/dsdanhmuc.php'); 
                }
                if ($_GET['cvk'] == 7) {
                    include_once ('tacgia/themtg.php'); 
                }
                 if ($_GET['cvk'] == 8) {
                     include_once ('tacgia/dstacgia.php'); 
                }
                 if ($_GET['cvk'] == 9) { 
                     include_once ('sanpham/phieunhap.php');
                }
                 if ($_GET['cvk'] == 10) {
                                      
                }
                 if ($_GET['cvk'] == 11) {
                    include_once ('sanpham/ds-sanpham.php');
                   
                } 
                 if ($_GET['cvk'] == 12) {
                    include_once ('sanpham/ds-sanpham.php');             
                }
                if ($_GET['cvk'] == 13) {
                    include_once ('sanpham/themsp.php');             
                } 
                if ($_GET['cvk'] == 14) {
                    include_once ('sanpham/thongtinnhap.php');             
                } 
                if ($_GET['cvk'] == 15) {
                    include_once ('sanpham/capnhat.php');             
                }   
            }
            else     
                if(isset($_GET['ac']))
                {
                include_once ('thongtin/thongtin.php');
                                                                                                                                                                                                
                }
                else
                  if (isset($_GET['ctd'])) {
                  include_once ('donhang/ctdonhang.php');
            }
            else if(isset($_GET['in_hoadon'])){
                include_once ('donhang/hoadon.php');
            }
            
            else {
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