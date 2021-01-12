<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/startstop-slider.js"></script>
        <link rel='stylesheet' href='sweet/css.css'>
        <script src='sweet/js.js'></script>
        <style>  
            .wrap{
            }
            .wrap h1{
                color:blue;
            }        
            .wrap-giohang{
                width: 100%;
                height:auto;
                background:#EDEDED;;
                margin-left: auto;
                margin-right: auto; 

            }
            .list_sp{
               
                float:left;
                background: #EDEDED;
                width: 60%;
                height: auto;
                margin: 10px 10px;
                margin-bottom: 10px; 
                border-radius: 10px;
            }
            .list_sp #img{
                float: left;           
                margin-left: 10px;
                margin-top: 10px;
            }  
            .list_sp #info{
                width: 80%;
                margin-left: 150px;
                margin-top: 10px;
            } 
            .list_sp #info button[id='update']{            
               
                background:green;
                color: #FFF;
                border-radius:10px;
                font-weight: bold;
                margin-left: 8px;
            }
            .list_sp #info button[id='delete']{                        
                width: 50px; 
                font-weight:bold ;
                background: #B81D22;
                color: #FFF;
                border-radius:10px;
            }        
            .list_sp #info span{
                color:red;
            }
            .list_sp #info h5{
                color:#B81D22;
            }      
            .list_info{
                float:right;
                background:#F0F0F0;
                width: 36%;
                height: 300px;
                margin-top:10px;
                border-radius: 13px;
                margin-right: 10px;

            }
            .list_info h2{
                margin-top: 10px;
                color: #B81D22;

            }
            .list_info table{
                width: 90%;
                height: 150px;

                margin-top: 20px;
                border: 2px;
                margin-left: 20px;       
            }
            .list_info #tt a{
                float:left;      
            }
            .list_info #tt form{
                float:right;      
            }
            .list_info #tt input{
                width:150px;
                background: #2A5C86;
                color: #fff;
                margin-right: 10px;
                font-size: 1.1em;
                border-radius: 5px;
            }
            .list_info table tr td {
                text-align: left;  
                margin-top:5px;
                color: #2A5C86;
            }
            .list_info table tr td span{
                color:red;
            }
        </style>
        <title>Giỏ Hàng</title>
    </head>
    <body> 
        <?php
        include 'classes/product.php';
        include_once 'lib/database.php';
        $pd = new product();
        ?>
        <?php
        session_start();
        ?> 
        <?php
        /// xóa tất cả sản phẩm trong giỏ hàng.
        if (isset($_POST['xoa'])) {
            unset($_SESSION['product']);
            //header('location:giohang.php');
            echo'<script>onload= function(){   
                swal("Đã xóa toàn bộ giỏ hàng!","","success")
                };
                </script>'; 
        }
        ?>  
        <?php
        /// xóa sản phẩm trong giỏ hàng theo id.
        if (isset($_POST['removep']) && isset($_SESSION['product'])) {
            $product_id = $_POST['removep'];
            $a = false;
            foreach ($_SESSION['product'] as $cart_itm) {
                if ($cart_itm['id'] != $product_id) {
                    $product[] = array('image' => $cart_itm['image'], 'name' => $cart_itm['name'], 'id' => $cart_itm['id'], 'qty' => $cart_itm['qty'], 'price' => $cart_itm['price']);
                    $a = true;
                }
                if($a==true)
                {
                $_SESSION['product'] = $product;
                }
                else {
                    unset($_SESSION['product']);

                }
            }
            //header('location:giohang.php');
            echo'<script>onload= function(){   
                swal("Đã xóa sản phẩm khỏi giỏ hàng!","","success")
                };
               </script>';
        }
        ?>       
        <?php       
        //// cap nhật số lượng
         if (isset($_POST['up-cart']) && isset($_SESSION['product']) && isset($_POST['up_slg'])) {
             $id = $_POST['up-cart'];
             $slg = $_POST['up_slg'];
             $tv = $pd->getproductbyId($id);
             $tv2 = $tv->fetch_assoc();
             $slgcon = $tv2['SoluongCon'];
             if($slg >5 or $slg <1){
                echo'<script>onload= function(){   
                swal("Số lượng không hợp lệ!","chỉ được mua từ 1 đến 5 cuốn sách trên một đầu sách","error")
                };
               </script>';
             }
             else if($slg > $slgcon)
             {
                echo'<script>onload= function(){   
                swal("Cập nhật thất bại!","Không đủ số lượng trong kho!","error")
                };
               </script>';
             }
             else{                                                    
            foreach ($_SESSION['product'] as $cart_itm) {
                if ($cart_itm['id'] != $id) {
                    $product[] = array('image' => $cart_itm['image'], 'name' => $cart_itm['name'], 'id' => $cart_itm['id'], 'qty' => $cart_itm['qty'], 'price' => $cart_itm['price']);
                }
                else
                {                   
                    $product[] = array('image' => $cart_itm['image'], 'name' => $cart_itm['name'], 'id' => $cart_itm['id'], 'qty' => $slg, 'price' => $cart_itm['price']);
                }
                
                $_SESSION['product'] = $product;
                echo'<script>onload= function(){   
                swal("Cập nhật số lượng thành công!","","success")
                };
               </script>';
            }
             }
        }
        ?>
        <?php
        include('inc/header.php');
        ?>    
        <div class="wrap">                   
            <div class="wrap-giohang">
                <div class="list_sp">                   
                    <?php
                    if (isset($_SESSION['product'])) {
                        $total = 0;
                        $count = 0;
                        foreach ($_SESSION['product'] as $cart_itm) {
                            echo"<div class='list_sp'>";
                            echo"<div id='img'>";
                            echo '<img src="images/' . $cart_itm['image'] . '" width="100" height="150" /></div>';
                            echo"<div id='info'>";
                            echo '<h5 style="font-weight:bold">Sản phẩm: ' . $cart_itm['name'] . '</h5>';
                            $id = $cart_itm['id'];
                            echo '<p>Số lượng</p><form action="giohang.php" method="POST"><input style="width:30px;border-radius:5px;" type="text"  name ="up_slg" placeholder="' . $cart_itm['qty'] . '"><button id= "update" name="up-cart" type="submit" value="' . $cart_itm['id'] . '">Cập nhật</button></form>';
                            $gia = '' . $cart_itm['price'] . '';
                            $gia = number_format($gia, 0, ",", ".");
                            echo "Giá bán: <span>$gia</span> vnđ";
                            $dem = $cart_itm["qty"];
                            $subtotal = ($cart_itm["price"] * $cart_itm["qty"]);
                            $total = ($total + $subtotal);
                            $count = $count + $dem;
                            echo"<br>";
                            echo"--------------------------------------------------------------";
                            echo"<br>";
                            echo"<form action='giohang.php' method='POST'><button id ='delete'type='submit' name='removep' value='$id'>X</button></form>";
                            echo"</div>";
                            echo"</div>";
                        }
                    } else {
                        echo '<img src="images/empty-cart.png">';
                    }
                    ?> 
                    
                </div>
                <div class="list_info">
                    <center><h2>THÔNG TIN GIỎ HÀNG
                            <br>----------------------------------------</h2></center>  
                    <table>
                        <tr><form method="POST" action="giohang.php"><button onclick="return confirm('Bạn muốn xóa tất cả sản phẩm')"name='xoa' type='submit'style='margin-left: 20px;background: #B81D22;color: #fff;height:30px;'>XÓA TẤT CẢ SẢN PHẨM</button></form></tr>
                        <tr><td>TỔNG CỘNG:  
                    <?php
                    if (isset($_SESSION['product'])) {
                        echo $count;
                        echo " Sản phẩm";
                    } else {
                        echo" Giỏ hàng trống";
                    }
                    ?>
                            </td></tr>
                        <tr><td>THÀNH TIỀN:
                                <?php
                                if (isset($_SESSION['product'])) {
                                    $total = number_format($total, 0, ",", ".");
                                    echo"<span>";
                                    echo $total;
                                    echo"</span>";
                                    echo " vnđ";
                                } else {
                                    echo" 0.00 vnđ";
                                }
                                ?>
                            </td></td></tr>
                        <tr><td><span>
                    <?php
                    if (isset($_SESSION['dangnhap'])) {
                        echo "Xin chào:  ";
                        echo$_SESSION['dangnhap'];
                        echo "<br>";
                        echo"Nhấn đặt hàng để tiến hành mua sản phẩm";
                    } else {
                        echo"Bạn cần phải đăng nhập để mua hàng<br>Nhấn <a href='dangki.php'><button>Đăng kí</button></a> Nếu chưa có tài khoản";
                    }
                    ?></span>
                            </td></tr>
                        <tr><td>-----------------------------------------------------------------</td></tr>
                    </table>
                    <div id="tt">
                        <?php
                        if (isset($_SESSION['dangnhap'])) {
                            if (isset($_SESSION['product'])) {
                                echo '<form action="thanhtoan.php?dc=1" method="post">';
                                echo '<input type="submit" name="muahang" value="ĐẶT HÀNG"/>';
                                echo '</form>';
                            }
                        }
                        ?>
                    </div>
                </div>             
            </div>
        </div> 
        <div class="clear"></div>
        <div class="footer">
            <div class="wrap">
                <div class="section group">
                    <div class="col_1_of_4 span_1_of_4">
                        <h4>Thông Tin</h4>
                        <ul>
                            <li><span><a href="index.html">HKBOOK.COM</a></span></li>
                            <li><a href="">Hệ Thống Dịch Vụ</a></li>
                            <li><a href="#">Nâng cao</a></li>
                            <li><a href="">Đặt Hàng</a></li>						
                        </ul>
                    </div>				
                    <div class="col_1_of_4 span_1_of_4">
                        <h4>Tài Khoản</h4>
                        <ul>
                            <li><a href="">Đăng Nhập</a></li>
                            <li><a href="">Đăng ký</a></li>
                            <li><a href="">Cập Nhật Thông Tin</a></li>
                            <li><a href="">Giỏ hàng</a></li>
                            <li><a href="">Trợ Giúp</a></li>
                        </ul>
                    </div>
                    <div class="col_1_of_4 span_1_of_4">
                        <h4>Liên Hệ</h4>
                        <ul>
                            <li><span>+84-123-456789</span></li>
                            <li><span>+84-123-000000</span></li>
                        </ul>
                        <div class="social-icons">
                            <h4>Thông Tin Liên Hệ</h4>
                            <ul>
                                <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
                                <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
                                <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
                                <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
                                <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
                                <div class="clear"></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy_right">
                <p>&copy; 2020 HK BOOK. All rights reserved | Bùi Quang Lâm</p>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <a href="#" id="toTop"><span id="toTopHover"> </span></a>   



    </body>
