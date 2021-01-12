<?php
/// kết nối database
$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
session_start();
?>
<?php
/////////
if (isset($_POST['ok'])) {
    if (isset($_POST['dc'])&& $_POST['ten']!=NULL&& $_POST['sdt']!=NULL && $_POST['diachi']!=NULL) {
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $ngay = date('Y-m-d');
        $hoten = $_SESSION['makh'];
        $sql = "select*from khachhang where MaKH='$hoten'";
        $sql_tv = mysql_query($sql);
        while ($row_tv = mysql_fetch_array($sql_tv)) {
            $idnd = $row_tv['MaKH'];
        }
    } else {
        $makh = $_SESSION['makh'];
        $sql = "select*from khachhang where MaKH ='$makh'";
        $sql_tv = mysql_query($sql);
        while ($row_tv = mysql_fetch_array($sql_tv)) {
            $idnd = $row_tv['MaKH'];
            $ten = $row_tv['HoTen'];
            $email = $row_tv['Email'];
            $sdt = $row_tv['SDT'];
            $diachi = $row_tv['DiaChi'];
            $ngay = date('Y-m-d');
        }
    }
}
$insert_cart = "insert into donhang(MaKH,NgayLap,HoTenNN,SDT,DiaChiNN,TrangThai) value ('$idnd','$ngay','$ten','$sdt','$diachi','đang xử lí')";
$ketqua = mysql_query($insert_cart);
if ($ketqua) {
    for ($i = 0; $i < count($_SESSION['product']); $i++) {
        $max = mysql_query("select max(MaDH) from donhang where MaKH='$makh'");
        $row = mysql_fetch_array($max);
        $cart_id = $row[0];
        $product_id = $_SESSION['product'][$i]['id'];
        $quantity = $_SESSION['product'][$i]['qty'];
        $price = $_SESSION['product'][$i]['price'];
        $insert_cart_detail = "insert into ctdonhang(MaDH,MaSP,SoLuong,DonGia) values('" . $cart_id . "','" . $product_id . "','" . $quantity . "','" . $price . "');";
        $cart_detail = mysql_query($insert_cart_detail);
        $sql1 = "select Soluongcon from sanpham where MaSP='" . $product_id . "'";
        $chitietsl = mysql_query($sql1);
        $row_chitietsl = mysql_fetch_array($chitietsl);
        $slg = $row_chitietsl['Soluongcon'];
        $slgcon = $slg - $quantity;
        $sql2 = "UPDATE sanpham set Soluongcon='$slgcon' where MaSP='" . $product_id . "'";
        mysql_query($sql2);
    }
}
unset($_SESSION['product']);
header('location:camon.php');
?>