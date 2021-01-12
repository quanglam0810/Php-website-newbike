<!DOCTYPE html>
<head>
    <title>ĐĂNG KÍ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
          Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="style-log/css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="style-log/css/style.css" rel='stylesheet' type='text/css' />
    <link href="style-log/css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="style-log/css/font.css" type="text/css"/>
    <link href="style-log/css/font-awesome.css" rel="stylesheet"> 
    <!-- //font-awesome icons -->
    <script src="style-log/js/jquery2.0.3.min.js"></script>
     <link rel='stylesheet' href='sweet/css.css'>
    <script src='sweet/js.js'></script> 
    <style>
        .log-w3
        {
        }
        .w3layouts-main{                    
            width:480px;
            margin-top: 30px;
            border-radius: 15px;
        }
        .w3layouts-main form .ggg{
            
            height: 10px;
        }
        .w3layouts-main form .ok{
            border-radius: 10px;
            background: #111;
            margin-top: -5px;
        }
    </style>
</head>
<body>
    <?php
    $connect = mysql_connect("localhost", "root", "");
    $csdl = "book_store";
    mysql_select_db($csdl, $connect);
    mysql_query("set names 'utf8'");
    session_start();
    ?>        
        <?php include 'classes/khachhang.php';
        $kh = new khachhang();
        ?>
    
    <?php
    if (isset($_POST['resign'])) {
        $tk = $_POST['tk'];
        $mk = md5($_POST['mk']);
        $ten = $_POST['hoten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $dc = $_POST['diachi'];
        $tv1 = $kh->checktk($tk);
        $tv2 = $kh->checkmail($email);
        $tv3 = $kh->checksdt($sdt);       
        if($tv1)
        {
            echo'<script>onload= function(){   
                swal("Tên Tài Khoản Này Đã Được Sử Dụng", "Thử dùng tên khác thay thế", "error");
                     };
                 </script>';
        }
        else if ($tv2) {
            echo'<script>onload= function(){   
                swal("Email Này Đã Được Sử Dụng", "Xin thử lại", "error");
                     };
                 </script>';
        } 
        else if ($tv3) {
            echo'<script>onload= function(){   
                swal("Số Điện Thoại Này Đã Được Sử Dụng", "Xin thử lại", "error");
                     };
                 </script>';
        }
        else {           
            $sql = "insert into khachhang(TaiKhoan,MatKhau,HoTen,Email,SDT,DiaChi)values('$tk','$mk','$ten','$email','$sdt','$dc')";
            $run_c = mysql_query($sql);
            if ($run_c) {
               echo'<script>onload= function(){   
                swal("Đăng kí tài khoản thành công", "Đăng nhập hệ thống để trải nghiệm", "success");
                     };
                 </script>';
            }
        }
    } 
    ?>
    <div class="log-w3">
        <div class="w3layouts-main">                     
            <h2>ĐĂNG KÍ THÀNH VIÊN</h2>
            <form action="dangki.php" method="post">
                <input type="input" class="ggg" name="tk" placeholder="Nhập tên tài khoản đăng kí" required="">
                <input type="password" class="ggg" name="mk" placeholder="Nhập mật Khẩu" required=""> 
                <input type="input" class="ggg" name="hoten" placeholder="Nhập họ và tên" required="">
                <input type="email" class="ggg" name="email" placeholder="Nhập email liên hệ" required=""> 
                <input type="number" class="ggg" name="sdt" placeholder="Nhập số điện thoại " required=""> 
                <input type="input" class="ggg" name="diachi" placeholder=" Nhập địa chỉ" required=""> 
                <div class="clearfix"></div>
                <input type="submit" value="ĐĂNG KÍ" name="resign" class="ok">
            </form>          
            <p><a href="index.php">#TRANG CHỦ</a></p>
        </div>
    </div>
    <script src="style-log/js/bootstrap.js"></script>
    <script src="style-log/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="style-log/js/scripts.js"></script>
    <script src="style-log/js/jquery.slimscroll.js"></script>
    <script src="style-log/js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="style-log/js/jquery.scrollTo.js"></script>
</body>
</html>
