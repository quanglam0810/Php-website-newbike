<?php

$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
?>
<?php

$id = $_POST['id'];
$sql = "select TrangThai from donhang where MaDH='$id'";
$tv = mysql_query($sql);
while ($row_tv = mysql_fetch_array($tv)) {
    $tt = $row_tv['TrangThai'];
    // echo"$tt";
}
?>
<?php

if ($tt != 'đang xử lí') {
    echo"<script>alert('Không thể hủy đơn')</script>";
} else {
    $sql2 = "update donhang set TrangThai='đã hủy đơn' where MaDH='$id'";
    mysql_query($sql2);
    $sql3 = "select * from ctdonhang where MaDH ='$id'";
    $tv2 = mysql_query($sql3);
    while ($rowct = mysql_fetch_array($tv2)) {
        $masp = $rowct['MaSP'];
        $slg = $rowct['SoLuong'];
        $sql4 = "select SoluongCon from sanpham where MaSP ='$masp'";
        $tv3 = mysql_query($sql4);
        $rowct2 = mysql_fetch_array($tv3);
        $slkho = $rowct2['SoluongCon'];
        $tongsp = $slkho + $slg;
        $sql4 = "update sanpham set SoluongCon ='$tongsp' where MaSP='$masp'";
        mysql_query($sql4);
    }

    header('location:../profile.php?ct=1');
}
?>