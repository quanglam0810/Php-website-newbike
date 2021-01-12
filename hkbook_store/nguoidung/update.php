<?php

$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
?>
<?php

if (isset($_POST['update'])) {
    $sdt_ud = $_POST['sdt'];
    $email_ud = $_POST['email'];
    $diachi_ud = $_POST['diachi'];
    $info2 = $_POST['makh'];
    if ($email_ud != NULL and $diachi_ud != NULL and $sdt_ud != NULL) {
        $sql1 = "update khachhang set Email ='$email_ud',SDT = '$sdt_ud',DiaChi ='$diachi_ud' where MaKH = '$info2'";
        mysql_query($sql1);
        header('location:../profile.php?ct=2&sussce');
    }
    else { 
        header('location:../profile.php?ct=2&faill');
    }
} else {
    if(isset($_POST['updatemk']))
    {
        $mk1=$_POST['mk1'];
        $mk2=md5($_POST['mk2']);
        $mk22=md5($_POST['mk22']);
        $info2 = $_POST['makh'];
         if ($mk1 != NULL and $mk2 != NULL and $mk22 != NULL and $mk2==$mk22) {
        $sql1 = "update khachhang set MatKhau ='$mk2' where MaKH = '$info2'";
        mysql_query($sql1);
        header('location:../profile.php?ct=3&ok');
    }
 else {
        header('location:../profile.php?ct=3&fail');
    }
}
}
?>