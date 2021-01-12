<style>
    h2
    {
        text-transform: uppercase;
    }
</style>
<?php include 'classes/product.php'; ?>
<?php require_once 'helpers/format.php'; ?>
<?php
$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
?>
<?php include_once ("inc/header.php"); ?>
<div class="wrap">
    <div class="content">
    <?php
    if (isset($_GET['ma']) && $_GET['ma'] == 'all') {
        //// lay 16 san pham moi nhat 
        if (isset($_GET['page'])) {
            $item_page = 8;
            $curen_page = $_GET['page'];
            $offset = ($curen_page - 1) * $item_page;
        }
        echo"<h1 style='font-size=1.5em;margin-left:10px;margin-bottom:10px;margin-top:10px;color:#33333;'>SẢN PHẨM MỚI NHẤT</h1>";
        $tv = "select MaSP,TenSP,Hinh,DonGia from sanpham where TrangThai ='0' order by MaSP desc limit $offset,$item_page";
        $tv_1 = mysql_query($tv, $connect);
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
                    //echo "<a img src='$link_chi_tiet' >";
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
            $arrs_list = mysql_query("select MaSP from sanpham",$connect);
            $total_record = mysql_num_rows($arrs_list);//tính tổng số bản ghi có trong bảng khoahoc       
            $page = ceil($total_record/$item_page);
            ?>
    <table style="float:right;margin-bottom: 10px;">
        <tr>
            <td><button><<</button></td>
            <?php
                for($i=1;$i<= $page;$i++)
                {
                    echo"<td><button><a href='ds-sanpham.php?ma=all&page=$i'</a>$i</button></td>";
                }
                $i++;
            ?>
            <td><button>>></button></td>
        </tr>
    </table>
    <div class ="clear"></div>
    <?php
    }
    if (isset($_GET['ma']) && $_GET['ma'] == 'sale') {
        //// kiem tra co ton tai bien get hay không
         if (isset($_GET['page'])) {
            $item_page = 8;
            $curen_page = $_GET['page'];
            $offset = ($curen_page - 1) * $item_page;
        }
        //// lay  san pham sách sale
        echo"<h1 style='font-size=1.5em;margin-left:10px;margin-bottom:10px;margin-top:10px;color:#33333;'>SẢN PHẨM GIẢM GIÁ</h1>";
        $tv = "select MaSP,TenSP,Hinh,DonGia,GiamGia from sanpham where GiamGia !='0' and TrangThai ='0' order by MaSP desc limit $offset,$item_page ";
        $tv_1 = mysql_query($tv, $connect);
        while ($tv_2 = mysql_fetch_array($tv_1)) {
            echo"<table>";
            echo "<div class='section group'>";
           for ($i = 1; $i <= 4; $i++) {
                echo "<div class='grid_1_of_4 images_1_of_4'>";
                if ($tv_2 != false) {
                    $link_anh = "images/" . $tv_2['Hinh'];
                    $link_chi_tiet = "idsp=" . $tv_2['MaSP'];
                    $gia = $tv_2['DonGia'];
                    
                   // echo "<a img src='$link_chi_tiet' >";
                    echo "<a><img src='$link_anh'></a>";
                    echo "</a>";
                    echo "<br>";
                    echo "<br>";
                    echo "<a href='chitiet.php?$link_chi_tiet' >";
                    $ten = $tv_2['TenSP'];
                    $giamgia = $tv_2['GiamGia'];
					$giaban= $gia-(($gia/100)*$giamgia);
					$giaban = number_format($giaban, 0, ",", ".");
                    echo "<h2>$ten</h2>";
                    echo "<h4>Giảm Giá: -<a style='color: red'>$giamgia %</a><strike>$gia</strike></h4>";
                    echo "</a>";
                    echo"<div class='price-details'><div class='price-number'>";
                    echo "<span>$giaban  VNĐ</span>";
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
            $arrs_list = mysql_query("select MaSP from sanpham where GiamGia!=0",$connect);
            $total_record = mysql_num_rows($arrs_list);//tính tổng số bản ghi có trong bảng khoahoc       
            $page = ceil($total_record/8);
            ?>  
    <table style="float:right;margin-bottom: 10px;">
        <tr>
            <td><button><<</button></td>
            <?php
                for($i=1;$i<= $page;$i++)
                {
                    echo"<td><button><a href='ds-sanpham.php?ma=sale&page=$i'</a>$i</button></td>";
                }
                $i++;
            ?>
            <td><button>>></button></td>
        </tr>
    </table>
    <div class ="clear"></div>
    <?php
    }
    if (isset($_GET['ma']) && $_GET['ma'] == 'vhvn') {
         //// kiem tra co ton tai bien get hay không
         if (isset($_GET['page'])) {
            $item_page = 8;
            $curen_page = $_GET['page'];
            $offset = ($curen_page - 1) * $item_page;
        }
        //// lay 16 san pham vhvn
        echo"<h1 style='font-size=1.5em;margin-left:10px;margin-bottom:10px;margin-top:10px;color:#333333;'>VĂN HỌC VIỆT NAM</h1>";
        $tv = "select MaSP,TenSP,Hinh,DonGia from sanpham where MaLoai ='VHVN01'and  TrangThai ='0' order by MaSP desc limit $offset,$item_page ";
        $tv_1 = mysql_query($tv, $connect);
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
                    //echo "<a img src='$link_chi_tiet' >";
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
            $arrs_list = mysql_query("select MaSP from sanpham where MaLoai='VHVN01'",$connect);
            $total_record = mysql_num_rows($arrs_list);//tính tổng số bản ghi có trong bảng khoahoc       
            $page = ceil($total_record/8);
            ?>  
    <table style="float:right;margin-bottom: 10px;">
        <tr>
            <td><button><<</button></td>
            <?php
                for($i=1;$i<= $page;$i++)
                {
                    echo"<td><button><a href='ds-sanpham.php?ma=vhvn&page=$i'</a>$i</button></td>";
                }
                $i++;
            ?>
            <td><button>>></button></td>
        </tr>
    </table>
    <div class ="clear"></div>
    <?php
    }
    if (isset($_GET['ma']) && $_GET['ma'] == 'tieuthuyet') {
        //// kiem tra co ton tai bien get hay không
         if (isset($_GET['page'])) {
            $item_page = 8;
            $curen_page = $_GET['page'];
            $offset = ($curen_page - 1) * $item_page;
        }
        //// lay  san pham tieu thuyet
        echo"<h1 style='font-size=1.5em;margin-left:10px;margin-bottom:10px;margin-top:10px;color:#333333;'>TIỂU THUYẾT NGÔN TÌNH</h1>";
        $tv = "select MaSP,TenSP,Hinh,DonGia from sanpham where MaLoai ='NT01'and  TrangThai ='0' order by MaSP desc limit $offset,$item_page";
        $tv_1 = mysql_query($tv, $connect);
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
                    echo "<a img src='$link_chi_tiet' >";
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
            $arrs_list = mysql_query("select MaSP from sanpham where MaLoai='NT01'",$connect);
            $total_record = mysql_num_rows($arrs_list);//tính tổng số bản ghi có trong bảng khoahoc       
            $page = ceil($total_record/8);
            ?>  
    <table style="float:right;margin-bottom: 10px;">
        <tr>
            <td><button><<</button></td>
            <?php
                for($i=1;$i<= $page;$i++)
                {
                    echo"<td><button><a href='ds-sanpham.php?ma=tieuthuyet&page=$i'</a>$i</button></td>";
                }
                $i++;
            ?>
            <td><button>>></button></td>
        </tr>
    </table>
    <div class ="clear"></div>
    <?php
    }
   
    if (isset($_GET['madm'])) {
        $madm = $_GET['madm'];
         //// kiem tra co ton tai bien get hay không
         if (isset($_GET['page'])) {
            $item_page = 8;
            $curen_page = $_GET['page'];
            $offset = ($curen_page - 1) * $item_page;
        }
        //// lay san pham thuộc danh mục
        echo"<h1 style='font-size=1.5em;margin-left:10px;margin-bottom:10px;margin-top:10px;color:blue;'>SẢN PHẨM THUỘC DANH MỤC </h1>";
        $tv = "select * from sanpham where MaLoai ='$madm' and  TrangThai ='0' order by MaSP desc limit $offset,$item_page";
        $tv_1 = mysql_query($tv, $connect);
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
                    //echo "<a img src='$link_chi_tiet' >";
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
            $arrs_list = mysql_query("select MaSP from sanpham where MaLoai='$madm'",$connect);
            $total_record = mysql_num_rows($arrs_list);//tính tổng số bản ghi có trong bảng khoahoc       
            $page = ceil($total_record/8);
            ?>  
    <table style="float:right;margin-bottom: 10px;">
        <tr>
            <td><button><<</button></td>
            <?php
                for($i=1;$i<= $page;$i++)
                {
                    echo"<td><button><a href='ds-sanpham.php?madm=$madm&page=$i'</a>$i</button></td>";
                }
                $i++;
            ?>
            <td><button>>></button></td>
        </tr>
    </table>
    <div class ="clear"></div>
    <?php
    }
    ?>
</div>
</div>
<?php include_once ("inc/footer.php"); ?>