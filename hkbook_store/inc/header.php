<!DOCTYPE HTML>
<?php
include 'lib/session.php';
Session::init();
?>
<head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/startstop-slider.js"></script>   
</head>
<body>    
    <div class="header">
        <div class="headertop_desc">
            <div class="wrap">
                <div class="call">
                    <p><span>Hỗ trợ:</span> Phone number <span class="number">0985034354</span></span></p>
                </div>
                <div class="account_desc">
                    <ul>                                  
                        <?php
                        if (isset($_SESSION['dangnhap'])) {
                            $name = $_SESSION['dangnhap'];
                            echo'<a href="profile.php?ct=1"><button>Xin Chào: ';
                            ?><?php echo $name; ?></button></a>
                            <?php
                            echo'<a href="logout.php?tt=dangxuat"><button>ĐĂNG XUẤT</button></a>';
                        } else {
                            echo'<button>Xin chào: Khách Vãng Lai</button></a>';
                            echo'<li><a href="login.php">ĐĂNG NHẬP</a></li>			
                                        <li><a href="dangki.php">ĐĂNG KÍ</a></li> ';
                        }
                        ?>                                                                     
                    </ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href="index.php"><img src="images/logo2.png" alt="" /></a>
            </div>
            <div class="cart"> 
                <div class='icon'>
                            <a href="giohang.php"><image style="height: 50px; width: 50px;"src="images/giohang2.png"></a>
                            <?php
                            if (isset($_SESSION['product'])) {
                                $total = 0;
                                $count = 0;
                                foreach ($_SESSION['product'] as $cart_itm) {
                                    $id = $cart_itm['id'];
                                    $dem = $cart_itm["qty"];
                                    $subtotal = ($cart_itm["price"] * $cart_itm["qty"]);
                                    $total = ($total + $subtotal);
                                    $total1 = number_format($total, 0, ",", ".");
                                    $count = $count + $dem;
                                }
                            }
                            ?>             
                            <p style='margin-right: 15px;'><?php
                                if (isset($_SESSION['product'])) {
                                    echo " Giỏ Hàng<span>($count)</span>";                                                                                                        
                                  
                                } else {
                                    echo'Giỏ Hàng<span>(0)</span>';
                                }
                                ?>
                                </p></div>
                                
                       
            </div>
            <script type="text/javascript">
            function DropDown(el) {
                this.dd = el;
                this.initEvents();
            }
            DropDown.prototype = {
                initEvents : function() {
                    var obj = this;

                    obj.dd.on('click', function(event){
                        $(this).toggleClass('active');
                        event.stopPropagation();
                    }); 
                }
            }

            $(function() {

                var dd = new DropDown( $('#dd') );

                $(document).click(function() {
                    // all dropdowns
                    $('.wrapper-dropdown-2').removeClass('active');
                });

            });

        </script>
           
            <div class="clear"></div>
        </div>
    </div>
    <div class="header_bottom">
        <div class ="wrap">
            <div class="menu">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class=""><a href="">Giới Thiệu</a></li>
                    <li class=""><a href="">Liên Hệ</a></li>
                    <li class=""><a href="">Chuyên Mục Sách</a></li>
                    <li class=""><a href="">Tác Giả Nổi Bật</a>                        
                    </li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="search_box">
                <form action="../hkbook_store/xulitimkiem.php" method= "GET">
                    <input type="text" name="key" placeholder="Nhập tên sản phẩm muốn tìm">
                    <input type="hidden" name="page" value="1">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>  
</div>
</body>
