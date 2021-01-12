<!DOCTYPE html>
<head>
    <title>| Login</title>
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
</head>
<body>
    <div class="log-w3">
        <div class="w3layouts-main">           
            <?php
            $connect = mysql_connect("localhost", "root", "");
            $csdl = "book_store";
            mysql_select_db($csdl, $connect);
            mysql_query("set names 'utf8'");
            ?>
            <?php
            session_start();
            if (isset($_POST['Login'])) {
                $taikhoan = $_POST['email'];
                $matkhau = md5($_POST['password']);
                $sel_c = "select * from khachhang where TaiKhoan='$taikhoan' and MatKhau='$matkhau'";
                $run_login = mysql_query($sel_c);
                while ($dong_cart = mysql_fetch_array($run_login)) {
                    $khachhang = $dong_cart['HoTen'];
                    $user = $khachhang;
                    $makh = $dong_cart['MaKH'];
                }
                $check_login = mysql_num_rows($run_login);
                if ($check_login == 0) {
                    echo '<center>Tài khoản hoặc mật khẩu không đúng</center>';
                } else {
                    $_SESSION['dangnhap'] = $user;
                    $_SESSION['makh'] = $makh;
                    header('location:index.php');
                }
            }
            ?>
            <h2>ĐĂNG NHẬP</h2>
            <form action="login.php" method="post">
                <input type="input" class="ggg" name="email" placeholder="Tài Khoản" required="">
                <input type="password" class="ggg" name="password" placeholder="Mật Khẩu" required="">
                <span><input type="checkbox" />Lưu thông tin</span>
                <h6><a href="#">Quên mật khẩu?</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="ĐĂNG NHẬP" name="Login">
            </form>
            <p>Chưa có tài khoản ?<a href="dangki.php">Đăng kí</a></p>

            <p><a href="index.php"><--- TRANG CHỦ</a></p>

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
