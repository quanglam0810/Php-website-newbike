<head>
    <style>        
        .main table{
            width: 99%;
            margin-left:auto;
            margin-right: auto;
            border: 1px solid white;
            padding:5px;
        }
        .main table tr#label{
            background: #004a80;
            font-weight:bold;
            color: #FFF;
            font-size:0.8em;
            text-align:center;      
        }
        .main table td {
            border:1px solid black;              
            height: 35px;
            padding:3px;
            text-align:left;      
        }   
        .main table tr#price
        {
            border: 0px solid white;
        }
    </style>
</head>
<?php
$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
?>
<?php
$id = $_GET['ctd'];
$sql = "select * from ctdonhang where MaDH= '$id'";
$run_cart = mysql_query($sql);
?>
<div align="center"><h1 style='font-size: 1.8em;color: #002142;margin-bottom: 10px;'>CHI TIẾT ĐƠN HÀNG <?php echo'#MSDH'; echo $id?></h1></div>
<table>
    <tr id='label'>
        <td>STT</td>
        <td>HÌNH ẢNH</td>       
        <td>MÃ SẢN PHẨM</td>
        <td>TÊN SẢN PHẨM</td>
        <td>SỐ LƯỢNG MUA</td>
        <td>ĐƠN GIÁ</td>
        <td>TỔNG TIỀN</td>
    </tr> 
    <?php
    $i = 0;
    $tien = 0;
    while ($dong_cart = mysql_fetch_array($run_cart)) {
        $masp = $dong_cart['MaSP'];
        ?>
        <?php
        $tv = "select TenSP,Hinh from sanpham where MaSP ='$masp'";
        $tv1 = mysql_query($tv);
        while ($tv2 = mysql_fetch_array($tv1)) {
            $tensp = $tv2['TenSP'];
            $hinh = $tv2['Hinh'];
            $link_anh = 'images/' . $hinh;
        }
        ?>
        <tr text-aligament="ceter">
            <td><?php echo $i; ?></td>
            <td><?php echo "<img width= 70px; height=auto; src='$link_anh'>"; ?></td>           
            <td><?php echo $dong_cart['MaSP']; ?></td>
            <td><?php echo $tensp ?></td>
            <td><?php echo $dong_cart['SoLuong'] ?></td>
            <td><?php echo $dong_cart['DonGia'] ?></td> 
            <?php $tg = $dong_cart['SoLuong'] * $dong_cart['DonGia'] ?>
            <td><font color='red'><?php echo $tg ?></font></td> 
        </tr>
        <?php
        $tien = ($tien + $tg);
        $i++;
    }
    ?>
</table>
<table>
    <tr>
        <td style='float:right;margin-top:10px;'>Tổng Cộng:<font color="red">
            <?php
            $tien = number_format($tien, 0);
            echo $tien;
            ?> VIỆT NAM ĐỒNG </font>
        </td></tr>
</table>