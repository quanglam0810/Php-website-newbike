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
<body>
    <?php
        if (isset($_GET['time'])) {
            if ($_GET['time'] == 'thang') {
                $date1 = 30;           
        } else {
            $date1 = 7;
        }
        }
        ?>  
    <div class="main">
         <div class="menu_ct"> 
             <h3>Xem Theo</h3>
            <ul>
                <li><a href="in_nv.php?cv=5&time=tuan">Tuần Này</a></li>
                <li><a href="in_nv.php?cv=5&time=thang">Tháng Này</a></li>
            </ul>
             <?php
             $now = date('y-m-d');
                 $date = new DateTime($now);
                 $days = $date1;
                // >= php version 5.3
                 date_sub($date, date_interval_create_from_date_string($days . ' days'));
                  $date_minus = date_format($date, 'Y-m-d');
                 ?>
         </div>
        <div align="center"><h1 style='font-size: 1.8em;color: #002142;margin-bottom: 10px;'>Danh Sách Sản Phẩm</h1><a href='../admin/baocao.php?in_baocao&time=<?php echo $_GET['time']?>'>IN BÁO CÁO</a></div>
    <table>
    <tr id='label'>
        <td>STT</td>            
        <td>MÃ SẢN PHẨM</td>
        <td>TÊN SẢN PHẨM</td>
        <td>SỐ LƯỢNG BÁN RA</td>    
    </tr> 
<?php
$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
?>
<?php
   $sql = "SELECT MaSP,Sum(ctdonhang.SoLuong) FROM ctdonhang INNER JOIN donhang ON donhang.TrangThai='giao thành công' AND donhang.MaDH=ctdonhang.MaDH AND donhang.NgayGiao >='$date_minus' GROUP BY(ctdonhang.MaSP) ORDER BY SUM(ctdonhang.SoLuong) DESC limit 10";
   $run = mysql_query($sql);
   $i=0;
    while ($dong = mysql_fetch_array($run)) {   
        $i++;
        $masp = $dong['MaSP'];
        $tong = $dong['Sum(ctdonhang.SoLuong)'];
        $sql1 = "select TenSP from sanpham where MaSP = '$masp'";
        $run1 = mysql_query($sql1);
        $dong1 = mysql_fetch_array($run1);
       ?>
    <tr text-aligament="ceter">
            <td><?php echo $i?></td>
            <td><?php echo $masp?></td>
            <td><?php echo $dong1['TenSP']?></td>
            <td><?php echo $tong?></td>
    </tr>    
   <?php
    }
   ?>
    </table>
    </div>
</body>