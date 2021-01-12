<!DOCTYPE HTML>
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
     <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
     <style>
        
     </style>
</head>
<body>  
    <div class="wrap">
        <div class="main">
            <div class="content">
                <?php include 'classes/product.php'; ?>
                <?php require_once 'helpers/format.php'; ?>
                <?php $product = new product();
                $fm = new Format();
                ?>
                <div class="content_top">
                    <div class="heading">
                        <h3>SÁCH MỚI PHÁT HÀNH</h3>
                         
                    </div>
                    <div class="see">
                        <p><a href="ds-sanpham.php?ma=all&page=1">XEM THÊM SẢN PHẨM</a></p>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="section group"> 
                    <?php
                    $product_new = $product->getproduct_new();
                    if ($product_new) {
                        while ($result = $product_new->fetch_assoc()) {
                            ?>
                            <div class="grid_1_of_4 images_1_of_4">
                                
                                <a href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>"><img src="images/<?php echo $result['Hinh'] ?>"/></a>
                                <h2><?php echo $result['TenSP'] ?></h2>
                                <div class="price-details">
                                    <div class="price-number">
                                        <p><span class="rupees">                                                
                                                <?php $gia = number_format($result['DonGia'], 0, ",", "."); ?>
                                                <?php echo $gia;
                                                echo" vnđ";
                                                ?>
                                            </span></p></div>
                                    <div class="add-cart"><h4><a href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>">Xem chi tiết</h4></a></div>
                                </div>
                                <?php
                                echo"</div>";
                            }
                            echo"</div>";
                        }
                        ?>  
                                <!------>
                                <div class="banner" style="margin-bottom:-95px;">
                                   <div id="slider1" style="width:90%;height: 200px;background: #fff;position: relative;margin:0px auto 10px;">
                                        <img src="inc/image/2.jpg" alt="" width="99%" height="190" style='padding:5px;' />                            
                                        <img src="inc/image/3.jpg" alt="" width="99%" height="190" style='display: none;padding:5px;'/>
                                        <img src="inc/image/4.jpg" alt="" width="99%" height="190"style='display: none;padding:5px;' />
                                        <img src="inc/image/1.jpg" alt="" width="99%" height="190" style='display: none;padding:5px;'/>	                                                                                               
                                    </div>
                                   <script>
                                    (function(){
                                            var imgLen = document.getElementById('slider1');
                                            var images = imgLen.getElementsByTagName('img');
                                            var counter = 1;

                                            if(counter <= images.length){
                                                setInterval(function(){
                                                    images[0].src = images[counter].src;
                                                    console.log(images[counter].src);
                                                    counter++;

                                                    if(counter === images.length){
                                                        counter = 1;
                                                    }
                                                },3000);
                                            }
                                    })();
                                    </script>
                                    <div class="tde"><p style="position: relative;top:5px;">Sách Nổi Bật</p></div>
                                    <div class="noidung" style=''>
                                       
                                         <div class="section group" style='display:flex;overflow-x:auto;'> 
                                             <?php
                                             $product_new = $product->getproduct_kt();
                                             if ($product_new) {
                                                 while ($result = $product_new->fetch_assoc()) {
                                                     ?>
                                            
                                                     <div class="grid_1_of_4 images_1_of_4" style='min-width:180px;'>
                                                         
                                                         <a href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>"><img style="width:90%;height:225px;;"src="images/<?php echo $result['Hinh'] ?>"/></a>
                                                         <h2 style='color:#002142;text-transform: capitalize;'><?php echo $result['TenSP'] ?></h2>
                                                         <div class="price-details">
                                                             <div class="price-number" style='font-size: 1.2em;s'>
                                                                 <p>                                              
                                                                         <?php 
                                                                         $giamoi = $result['DonGia'];
                                                                         $gia = number_format($giamoi, 0, ",", "."); ?>
                                                                         <?php echo $gia;
                                                                         echo" vnđ"; ?>
                                                                     </p></div>
                                                             <div class="add-cart"><h4><a style='background:#0d3349;' href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>">Xem</h4></a></div>
                                                         </div>
                                                         <?php
                                                         echo"</div>";
                                                     }
                                                     //echo"</div>";
                                                 }
                                                 ?>  
                                                         
                                             </div>
                                             
                            </div>
                                              
                                       
                                    </div>
                                    
                            <div class="clear"></div>
                                <!-------------->
                                 <div class="content_bottom">
                    <div class="heading">
                        <h3>SÁCH GIẢM GIÁ</h3>
                    </div>
                    <div class="see">
                        <p><a href="ds-sanpham.php?ma=sale&page=1">XEM THÊM SẢN PHẨM</a></p>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="section group"> 
                    <?php
                    $product_sale = $product->getproduct_sale();
                    if ($product_sale) {
                        while ($result = $product_sale->fetch_assoc()) {
                            ?>
                            <div class="grid_1_of_4 images_1_of_4">
                                <a href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>"><img src="images/<?php echo $result['Hinh'] ?>"/></a>
                                <h2><?php echo $result['TenSP'] ?></h2><h4>Giảm Giá: -<a style="color: red"><?php echo $result['GiamGia'] ?>%</a> <strike><?php echo $result['DonGia'] ?></strike></h4>
                                <div class="price-details">
                                    <div class="price-number">
                                        <p><span class="rupees">                                                
                                                <?php 
                                                $giamoi = $result['DonGia']-(($result['DonGia']*$result['GiamGia'])/100);
                                                $gia = number_format($giamoi, 0, ",", "."); ?>
                                                <?php echo $gia;
                                                   echo" vnđ"; ?>
                                            </span></p></div>
                                    <div class="add-cart"><h4><a href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>">Xem chi tiết</h4></a></div>
                                </div>
                                <?php
                                echo"</div>";
                            }
                            echo"</div>";
                        }
                        ?>                                
                        <div class="content_bottom">
                            <div class="heading">
                                <h3>Sách văn học việt nam</h3>
                            </div>
                            <div class="see">
                                <p><a href="ds-sanpham.php?ma=vhvn&page=1">XEM THÊM SẢN PHẨM</a></p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="section group">
                            <?php
                            $product_vh = $product->getproduct_tv();
                            if ($product_vh) {
                                while ($result = $product_vh->fetch_assoc()) {
                                    ?>
                                    <div class="grid_1_of_4 images_1_of_4">
                                        <a href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>"><img src="images/<?php echo $result['Hinh'] ?>"/></a>
                                        <h2><?php echo $result['TenSP'] ?></h2>
                                        <div class="price-details">
                                            <div class="price-number">
                                                <p><span class="rupees">
        <?php $gia = number_format($result['DonGia'], 0, ",", "."); ?>
        <?php echo $gia;
        echo" vnđ"; ?>
                                                    </span></p></div>
                                            <div class="add-cart"><h4><a href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>">Xem chi tiết</h4></a></div>
                                        </div>
                                        <?php
                                        echo"</div>";
                                    }
                                    echo"</div>";
                                }
                                ?>        


                                <div class="clear"></div>                                
                                <div class="content_bottom">
                                    <div class="heading">
                                        <h3>Tiểu thuyết ngôn tình</h3>
                                    </div>
                                    <div class="see">
                                        <p><a href="ds-sanpham.php?ma=tieuthuyet&page=1">XEM THÊM SẢN PHẨM</a></p>
                                    </div>
                                    <div class="clear"></div>                
                                </div>
                                <div class="section group">
                                    <?php
                                    $product_nt = $product->getproduct_nt();
                                    if ($product_nt) {
                                        while ($result = $product_nt->fetch_assoc()) {
                                            ?>
                                            <div class="grid_1_of_4 images_1_of_4">
                                                <a href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>"><img src="images/<?php echo $result['Hinh'] ?>"/></a>
                                                <h2><?php echo $result['TenSP'] ?></h2>
                                                <div class="price-details">
                                                    <div class="price-number">
                                                        <p><span class="rupees">
                                                     <?php $gia = number_format($result['DonGia'], 0, ",", "."); ?>
                                                <?php echo $gia;
                                                echo" vnđ"; ?>
                                                            </span></p></div>
                                                    <div class="add-cart"><h4><a href="chitiet.php?idsp=<?php echo $result['MaSP'] ?>">Xem chi tiết</h4></a></div>
                                                </div>
                                                <?php
                                                echo"</div>";
                                            }
                                            echo"</div>";
                                        }
                                        ?>     

                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div> 
                        </div>                                
                        </body>