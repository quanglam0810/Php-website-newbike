<head>
    <style>  
        wrap
        {         
        }
        wrap.main .menu{
            width: 100%;
            height: 50px;
            background: #004a80;
            margin-top: 10px;
        }
        wrap.main .content{

            height: 100px;
            background: #fff;
            width: 100%;
        }     
    </style>
    <title>Trang cá nhân</title>
</head>
<body> 
    <?php
    include_once ('inc/header.php');
    ?>
    <div class="clear"></div>
    <div class="wrap">       
        <div class="main">        
            <div class="menu" style="width:100%;background: #004a80;margin-top:5px;">                
                <ul>
                    <li class=""><a href="profile.php?ct=1">KHÁCH HÀNG:  <?php echo $_SESSION['dangnhap']; ?></a></li>
                    <li class=""><a href="profile.php?ct=2">CẬP NHẬT THÔNG TIN CÁ NHÂN</a></li>
                    <li class=""><a href="profile.php?ct=3">ĐỔI MẬT KHẨU</a></li>
                    <div class="clear"></div>
                </ul>
            </div>
                <div class="clear"></div>                                                              
             <div class="content">
                    <?php
                    if (isset($_GET['ct'])) {
                        if ($_GET['ct'] == 1) {
                            include_once ('nguoidung/donhang.php');
                        }
                        if ($_GET['ct'] == 2) {
                            include_once ('nguoidung/thongtin.php');
                        }
                        if ($_GET['ct'] == 3) {
                            include_once ('nguoidung/doimatkhau.php');
                        }
                    } else {
                        include_once ('nguoidung/ctdonhang.php');
                    }
                    if(isset($_GET['ok'])){
                        echo"<script>alert('Đổi mật khẩu thành công, xin vui lòng đăng nhập lại')</script>";
                    }
                    else if(isset($_GET['fail'])){                      
                        echo"<script>alert('Có Lỗi, Xin thử lại')</script>";
                    } 
                    else if(isset($_GET['sussce'])){
                        echo"<script>alert('Cập Nhật thông tin cá nhân thành công')</script>";
                    }
                    else if(isset($_GET['faill'])){
                        echo"<script>alert('Cập nhật thất bại, Xin thử lại')</script>";
                    }
                    ?>                  
                </div>             
        </div>
        
    </div>
    <div class="clear"></div>
    <?php
        include('inc/footer.php');
    ?>
</body>