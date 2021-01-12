<style>
    .wrap{

    }
    .main{

    }
    .main h2{
        margin-top:10px;
        color:#1d71ab;
        font-size:1.2em;
        margin-left:30px;       
    }
    .main span{

        color:#400;
        font-size:0.9em;
        margin-left:5px;
    }
</style>
<?php include_once('inc/header.php'); ?>
<?php include_once('classes/product.php'); ?>
<?php
$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
?>
<?php
if (isset($_GET['key'])&&$_GET['key']!=NULL) {
    $tukhoa = $_GET['key'];
    $chuoi = trim(htmlspecialchars(addslashes($tukhoa)));
    ?>
    <div class="wrap">
        <div class="main">
            <h2>Kết quả tìm kiếm cho từ khóa:  <span><?php echo $tukhoa; ?></span></h2>
            <div class="content">
                <?php
                if (isset($_GET['page'])) {
                    $item_page = 4;
                    $curen_page = $_GET['page'];
                    $offset = ($curen_page - 1) * $item_page;
                }
                $tv = "select MaSP,TenSP,Hinh,DonGia from sanpham where TrangThai ='0'AND TenSP LIKE '%$chuoi%' order by MaSP desc limit $offset,$item_page";
                $tv_1 = mysql_query($tv, $connect);
                if($tv_1){
                while ($tv_2 = mysql_fetch_array($tv_1)) {
                    echo"<table>";
                    echo "<div class='section group'>";
                    for ($i = 1; $i <= 4; $i++) {
                        echo "<div class='grid_1_of_4 images_1_of_4'>";
                        if ($tv_2 != false) {
                            $link_anh = "images/" . $tv_2['Hinh'];
                            $link_chi_tiet = "idsp=" . $tv_2['MaSP'];
                            $gia = $tv_2['DonGia'];
                            $gia = number_format($gia, 0, ",", ".");
                            echo "<a><img src='$link_anh'></a>";
                            echo "</a>";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='chitiet.php?$link_chi_tiet' >";
                            $ten = $tv_2['TenSP'];
                            echo "<h2>$ten</h2>";
                            echo "</a>";
                            echo"<div class='price-details'><div class='price-number'>";
                            echo "<span>$gia  VNĐ</span>";
                            echo"</div>";
                            echo "<div class='add-cart'><h4><a href='chitiet.php?$link_chi_tiet'>Xem chi tiết</a></h4></div>";
                            echo "<br>";
                            echo"<div class='clear'></div>";
                            echo"</div>";
                        } else {
                            echo "&nbsp;";
                        }
                        echo "</div>";
                        echo"</td>";
                        if ($i != 4) {
                            $tv_2 = mysql_fetch_array($tv_1);
                        }
                    }
                    echo "</tr>";
                    echo"</table>";
                }
                ///// dem so trang, phân trang
                $arrs_list = mysql_query("select MaSP from sanpham where TrangThai ='0'AND TenSP LIKE '%$chuoi%'", $connect);
                $total_record = mysql_num_rows($arrs_list); //tính tổng số bản ghi có       
                $page = ceil($total_record / $item_page);
                ?>
                <table style="float:right;margin-bottom: 10px;">                    
                    <tr>
                        <td><button><?php echo $total_record;?> Kết quả |<?php echo $page;?> Trang</button></td>                       
                        <td><button><<</button></td>
                        <?php
                        for ($i = 1; $i <= $page; $i++) {
                            echo"<form method='GET' action='../hkbook_store/xulitimkiem.php'><td><input name='key' type='hidden' value='$tukhoa'><button name='page' value='$i'>$i</button></td></form>";
                        }
                        $i++;
                        ?>
                         <td><button>>></button></td>
                    </tr>
                </table>
                <?php
                }
                else{
                    echo'<center>Không có sản phẩm nào phù hợp</br><img height="300" width="350" src="images/erorr-search.jpg" alt=""/></center>';            
                }
                ?>
                <?php
            } else {
                echo'<center>Bạn Phải Nhập Từ Khóa Tìm Kiếm</br><img height="300" width="350" src="images/erorr-search.jpg" alt=""/></center>';
            }
            ?>
            <div class ="clear"></div>

        </div>            
    </div>
</div>
<div class="clear"></div>
<?php include_once('inc/footer.php'); ?>