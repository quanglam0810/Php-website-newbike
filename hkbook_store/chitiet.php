<?php
    include 'classes/category.php';
    include_once 'lib/database.php';
    include 'classes/khachhang.php';
?>
<?php
$dm = new category();
$fm = new Format();
?>
<?php
include 'classes/giohang.php';
include 'classes/product.php';
$giohang = new giohang();
$product = new product();
session_start();
 
?>
<!DOCTYPE HTML>
<head>
    <title>Trang chi tiết sản phẩm</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
    <link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/global.css">
    <script src="js/slides.min.jquery.js"></script>
    <link rel='stylesheet' href='sweet/css.css'>
    <script src='sweet/js.js'></script>
    <script>
        $(function () {
            $('#products').slides({
                preload: true,
                preloadImage: 'img/loading.gif',
                effect: 'slide, fade',
                crossfade: true,
                slideSpeed: 350,
                fadeSpeed: 500,
                generateNextPrev: true,
                generatePagination: false
            });
        });
    </script>
</head>
<body>  
    <?php
    include_once('inc/header.php');
    ?>
    <?php   
    if (isset($_GET['idsp'])&& isset($_POST['add'])) {
        $product_id = $_POST['id'];
        $product_qty = $_POST['slg'];
        $kt = $product->get_details($product_id);
         while ($result = $kt->fetch_assoc()) {
            $slgcon = $result['SoluongCon'];
            $tensp = $result['TenSP'];
            $hinh = $result['Hinh'];
            $giaban = $result['DonGia'];
            $giamgia= $result['GiamGia'];
              if($giamgia!=NULL)
                {
                 $gia= $giaban-(($giaban*$giamgia)/100);
                }
                else
                {
                $gia=$giaban;
                }
         }
         // kiểm tra số lượng trong kho
         if($product_qty > $slgcon){
            echo'<script>onload= function(){   
                swal("Không đủ số lượng trong kho!","Kiểm tra lại số lượng mua!!","error")
                };
                </script>';  
         }
         else
         {
            if(isset($_SESSION['product'])){  
                $found = false;
                foreach ($_SESSION['product'] as $cart_itm) {                                                               
                if($product_id==$cart_itm['id']){                   
                       $found = true;
                     }
                else{ 
                   $product1[] = array('image' => $cart_itm['image'], 'name' => $cart_itm['name'], 'id' => $cart_itm['id'], 'qty' => $cart_itm['qty'], 'price' => $cart_itm['price']);
                }               
                } 
                 if ($found == false) {
                      $add = $giohang->add_cart($tensp, $hinh, $product_id, $product_qty, $gia,$product1);
                     echo'<script>onload= function(){   
                     swal("Thêm vào giỏ hàng thành công", "", "success");
                     };
                        </script>';
                 }
                 else{
                     echo'<script>onload= function(){   
                         swal("Sản phẩm đã có trong giỏ hàng!", "vui lòng cập nhật số lượng trong mục giỏ hàng!", "warning");
                      };
                    </script>';
                 }
            }
             else{
                 //
                 $add= $giohang->add_cart_emty($tensp, $hinh, $product_id, $product_qty, $gia);
                     echo'<script>onload= function(){   
                     swal("Thêm vào giỏ hàng thành công", "", "success");
                     };
                        </script>';
                 ////                                                                                                                               
            }        
        }   
        $idsp = $_GET['idsp'];
        
    } else {
        $idsp = $_GET['idsp']; // Lấy productid trên host
    }
    ?>
    <?php
    include 'classes/author.php';
    //include 'classes/product.php';
    ?>
    <?php require_once 'helpers/format.php';
    ?>
    <?php
    //tạo một biến prodct mới
   // $product = new product();
    $fm = new Format();
    ?>
    <div class="wrap">
        <div class="main">
            <div class="content">    	
                <div class="section group">            
                    <?php
                    $pro = $product->get_details($idsp);
                    if ($pro) {
                        while ($result = $pro->fetch_assoc()) {
                            ?>				 					                                                                                                                                                                                                                                				     						     
                            <div class="cont-desc span_1_of_2">
                                <div class="product-details">				
                                    <div class="grid images_3_of_2">
                                        <div id="container">
                                            <div id="products_example">
                                                <div id="products">
                                                    <div class="slides_container">
                                                    </div>
                                                    <ul class="pagination">
                                                        <img width='300px' height='430px' src="images/<?php echo$result['Hinh'] ?>">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="desc span_3_of_2">
                                        <h2>Sản Phẩm: <?php echo $result['TenSP'] ?>  </h2>                                        
                                        <p>Tác Giả:<?php
                                            $au = new author();
                                            $matg = $result['MaTG'];
                                            $tacgia = $au->getauthorbyId($matg);
                                            $result1 = $tacgia->fetch_assoc();
                                            echo "<a href=''>";
                                            echo $result1['TenTG'];
                                            echo"</a>";
                                            ?></p>
                                        <p><a href="#"><?php echo $result['NXB'] ?></a></p>
                                        <p><?php
                                            if ($result['SoluongCon'] < 1) {
                                                echo"*---Sản Phẩm Hết Hàng---*";
                                            } else {
                                                echo 'Số Lượng Còn:';
                                                echo $result['SoluongCon'];
                                                echo' Sản phẩm';
                                            }
                                            ?>
                                        </p>
                                        <div class="price"> 
                                            <?php
                                            $giamgia = $result['GiamGia'];
                                            if ($giamgia != 0) {
                                                $gia1 = $result['DonGia'] - (($result['DonGia'] * $giamgia) / 100);
                                                ?>
                                            <div style="width:200px;background: red;color:#fff;padding: 5px;border: 1px solid red;"> <strike>Giá gốc: <?php echo$result['DonGia'];?> vnđ</strike> | -<?php echo $giamgia?>%</div>
                                                <p><span>Giá khuyến mại: <?php $gia = number_format($gia1, 0, ",", "."); ?>
                                                        <?php
                                                        echo $gia;
                                                        echo" vnđ";
                                                        ?></span></p>
                                                <?php
                                            } else {
                                                ?>
                                                <p><span>Giá Bán: <?php $gia = number_format($result['DonGia'], 0, ",", "."); ?>
                                                        <?php
                                                        echo $gia;
                                                        echo" vnđ";
                                                        ?></span></p>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <form action='chitiet.php?idsp=<?php echo $idsp?>' method='POST'>
                                            <div class="available">
                                                <p>Tùy chọn:</p>
                                                <ul>
                                                    <li>Loại bìa:
                                                        <select>
                                                            <option>Bìa cứng</option>
                                                            <option>Bìa mềm</option>
                                                            <option>Hộp gỗ</option>							
                                                        </select></li>						
                                                    <li>Số lượng:<select name='slg'>
                                                            <option value='1'>1</option>
                                                            <option value='2'>2</option>
                                                            <option value='3'>3</option>
                                                            <option value='4'>4</option>
                                                            <option value='5'>5</option>
                                                        </select></li>
                                                </ul>
                                            </div>
                                            <div class="share-desc">
                                                <div class="share">
                                                    <p>Chia sẽ:</p>
                                                    <ul>
                                                        <li><a href="#"><img src="images/facebook.png" alt="" /></a></li>
                                                        <li><a href="#"><img src="images/twitter.png" alt="" /></a></li>					    
                                                    </ul>
                                                </div>
                                                <div class="button">
                                                    <span>
                                                        <input type="hidden" name="id" value='<?php echo $idsp; ?>' >
                                                        <?php
                                                        if ($result['SoluongCon'] > 0) {
                                                            echo '<input type="submit" name="add" value="THÊM VÀO GIỎ HÀNG">';
                                                        } else {
                                                            echo '<input id ="het" type="button"  name="add" value="   SẢN PHẨM HẾT HÀNG">';
                                                        }
                                                        ?>                                                                                                   
                                                    </span>
                                                    <script>
                                                        document.getElementById('het').onclick= function(){   
                                                            swal("Sản Phẩm Tạm Hết Hàng!","","warning");
                                                         };
                                                   </script>
                                                </div>					
                                                <div class="clear"></div>
                                            </div>
                                            <div class="wish-list">
                                                <ul>
                                                    <li class="wish"><a href="#">Thêm vào danh sách yêu thích</a></li>

                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="product_desc">	
                                    <div id="horizontalTab">
                                        <ul class="resp-tabs-list">
                                            <li>Giới Thiệu Sách</li>

                                            <div class="clear"></div>
                                        </ul>
                                        <div class="resp-tabs-container">
                                            <div class="product-desc">
                                                <p><span><?php
                                                        echo $result['MoTa'];
                                                        ?>
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="review">					
                                                <div class="your-review">
                                                    <h3>Bạn cảm thấy sản phẩm này như thế nào?</h3>
                                                    <p>Hãy viết cảm nhận của bạn?</p>
                                                    <form action='nguoidung/them_binhluan.php' method='POST' >
                                                        <input type='hidden' name='id_sp' value='<?php echo $result["MaSP"] ?>'>
                                                        <?php
                                                        //session_start();
                                                        if(isset($_SESSION['makh']))
                                                        {
                                                            $makh=$_SESSION['makh'];
                                                        }
                                                        else
                                                        {
                                                            $makh='';
                                                        }
                                                        ?>
                                                        <input type='hidden' name='id_kh' value='<?php echo $makh?>'>
                                                        <div>
                                                            <span><label><span style="color:red;font-size:1em">
                                                                        <?php
                                                                        if(isset($_SESSION['makh']))
                                                                        {
                                                                            echo'Khách Hàng: ';echo $_SESSION['dangnhap'];
                                                                        }
                                                                        else{
                                                                        echo'*Bạn phải đăng nhập hệ thống để bình luận';}
                                                                        ?></span></label></span>                                           
                                                        </div>
                                                      					
                                                        <div>
                                                            <span><label>Bình luận<span class="red">*</span></label></span>
                                                            <span><textarea name='noidung'></textarea></span>
                                                        </div>
                                                        <div>
                                                            <span><input type="submit" name ='gui'value="GỬI BÌNH LUẬN"></span>
                                                        </div>
                                                    </form>
                                                </div>				
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#horizontalTab').easyResponsiveTabs({
                                            type: 'default', //Types: default, vertical, accordion           
                                            width: 'auto', //auto or any width like 600px
                                            fit: true   // 100% fit in a container
                                        });
                                    });
                                </script>                        
                            </div>   

                            <!----------->
                            <?php
                        }
                    }
                    ?> 
                    <!----right slide-------->

                    <div class="rightsidebar span_3_of_1"> 
                        <h3 class='categories' style='background-color:#CD1F25;'><a style='margin-left:15px;font-size:1.3em;padding:5px;font-weight: bold;color: #fff'>DANH MỤC SÁCH</a></h3>
                        <ul class="side-w3ls">                                          
                            <?php
                            $cat = $dm->show_category();
                            if ($cat) {
                                while ($result = $cat->fetch_assoc()) {
                                    ?>				
                                    <li style='text-transform: uppercase;'><a href="ds-sanpham.php?madm=<?php echo$result['MaLoai']; ?>&page=1" style="font-size: 0.9em;color:#1d71ab;"><?php
                                            echo $result['TenLoai'];
                                        }
                                    }
                                    ?></a></li>	
                        </ul>
                        <!------subrice--->
                        <div class="subscribe">
                            <h1 style="color:#400;font-size: 1.5em;">ĐĂNG KÍ NHẬN TIN </h1>
                            <p>Nhập email của bạn để cập nhật thông tin mới nhất về sản phẩm.......</p>
                            <div class="signup">
                                <form>
                                    <input type="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Địa chỉ E-mail';"><input type="submit" value="Sign up">
                                </form>
                            </div>
                        </div>
                        <!----- comment------>
                        <div class="community-poll">
                            <h2 style="color:#CD1F25;font-size: 1.1em;">Bình Luận Của Độc Giả</h2>
                            <h2 style="color:#00172F;">-------------------------------</h2>
                            <div class="poll">
                                <?php
                                $id = $idsp;
                                $kh = new khachhang;
                                $show = $kh->showbinhluan($id);
                                $j=0;
                                if($show!=NULL){
                                while($kqtv = $show->fetch_assoc())
                                {
                                    $j++; 
                                    $idnbl = $kqtv['MaKH'];
                                    $showten = $kh->showtenkh($idnbl);
                                    $ten = $showten->fetch_assoc();
                                ?>
                                <h2 style="color:#400;font-size: 1em;"><?php echo$ten['HoTen'] ?></h2>
                      
                                
                                <p>create at: <?php echo$kqtv['ThoiGian'] ?></p>
                                <h3><?php echo$kqtv['NoiDung'] ?></h3>
                                <p>----------------------------------------------</p>
                            <?php
                                }
                                }
                                else{
                                    echo'<p>Sản phẩm chưa có bình luận nào</p>';
                                }
                            ?>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
            <iframe width="100%" height="0">
                
            </iframe>
        </div>
    </div>
    <?php
    include_once('inc/footer.php');
    ?>
    <script type="text/javascript">
                $(document).ready(function () {
        $().UItoTop({easingType: 'easeOutQuart'});
        });
    </script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
    <!----cart--->
    <!--end cart-->
</body>
</html>

