<header>  
    <link rel='stylesheet' href='sweet/css.css'>
    <script src='sweet/js.js'></script>
</header>
<?php
$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
session_start();
?>
<?php

if (isset($_POST['add']) == 'add') {    
    $product_id = $_POST['id'];
    $product_qty = $_POST['slg'];
}
$sql = "select *from sanpham where MaSP ='$product_id' limit 1";
$run_pro = mysql_query($sql);
$row_pro = mysql_fetch_array($run_pro);
if ($row_pro) {
    if ($row_pro['SoluongCon'] < $product_qty) {
        $idr = $row_pro['MaSP'];       
       echo'<script>onload= function(){   
         swal("Không đủ số lượng trong kho!","error!","error")
        };
    </script>';          
    } else {
          $idr = $row_pro['MaSP']; 
          $giagiam = $row_pro['GiamGia'];
       if($giagiam!=NULL)
       {
            $gia=$row_pro['DonGia']-(($row_pro['DonGia']*$giagiam)/100);
       }
        else
        {
           $gia=$row_pro['DonGia'];
        }
        $new_pro = array(array('name' => $row_pro['TenSP'], 'image' => $row_pro['Hinh'], 'id' => $product_id, 'qty' => $product_qty, 'price' => $gia));
        if (isset($_SESSION['product'])) {
            $found = false;
            foreach ($_SESSION['product'] as $cart_itm) {
                if ($cart_itm['id'] == $product_id) {
                    $product_qty= $product_qty+$cart_itm['qty'];
                    if($product_qty>5){
                        $product_qty = 5;
                    }
                    
                    //$product[] = array('image' => $cart_itm['image'], 'name' => $cart_itm['name'], 'id' => $product_id, 'qty' => $product_qty, 'price' => $cart_itm['price']);
                    $found = true;
                    
                } else {
                    $product[] = array('image' => $cart_itm['image'], 'name' => $cart_itm['name'], 'id' => $cart_itm['id'], 'qty' => $cart_itm['qty'], 'price' => $cart_itm['price']);
                }
            }
            if ($found == false) {
                $_SESSION['product'] = array_merge($product, $new_pro);
                 echo'<script>onload= function(){   
          swal("Thêm vào giỏ hàng thành công", "Success!", "success");
        };
    </script>';
            } else {
                //$_SESSION['product'] = $product;
                 echo'<script>onload= function(){   
          swal("công", "Success!", "warning");
        };
    </script>';
            }
        } else {
            $_SESSION['product'] = $new_pro;
        }
       
        //header('location:giohang.php');                
    }
}
?>