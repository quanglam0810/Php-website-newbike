<html>
    <header>
        <style> 

            .menu_ct{
                width:900px;
                height: 30px;
                background: #004a80;
                margin-left: auto;
                margin-right: auto;
                border-radius: 5px;
            }
            .menu_ct li {            
                text-transform:uppercase;
                float:left;
                color: #004a80;
                height: 90%;
                margin-top: 3px;        
                width: 15%;
                border: 2px solid white;
            }
            .menu_ct li:hover,.menu li.active a{
                background:#B81D22;
            }
            .menu_ct li a{
                border-radius:6px 0 0 6px;
                -webkit-border-radius:6px 0 0 6px;
                -moz-border-rfadius:6px 0 0 6px;
                -o-border-radius:6px 0 0 6px;
                color: #FFF;
            }
            .menu_ct li a{
                border-radius:6px 0 0 6px;
                -webkit-border-radius:6px 0 0 6px;
                -moz-border-rfadius:6px 0 0 6px;
                -o-border-radius:6px 0 0 6px;
                color: #FFF;
                text-align: center;
                margin-left: 15px;
            }
            .conten{
                height: 210px;
                width:670px;
                margin-top: 50px;
                align-items: center;
                margin-left: auto;
                margin-right: auto;
            }          
            .conten #sanpham{
                height: 200px;
                width: 200px;                
                float:left;
                margin-left: 20px;
                background: #009da7;
            }
            .conten #sanpham a{
                color:#FFF;
                font-size:1.5em;
                text-align: center;
                margin-left: 20px;
                margin-top: 20px;

            }
            .conten #sanpham h1{
                background: #FFF;

            } 
            .block{

            }
            .block table{
                width:100%;                           
            }
            .block table tr td{
                width:250px;
                text-align: center;
            }
            .block table tr th{
                width:250px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php include '../classes/phieunhap.php'; ?>
        <?php include '../classes/product.php'; ?>
        <?php include '../classes/donhang.php'; ?>
        <?php
        ?>
        <?php
        if (isset($_GET['time'])) {
            if ($_GET['time'] == 'ngay') {
                $date1 = 0;
            } else if ($_GET['time'] == 'tuan') {
                $date1 = 7;
            } else if ($_GET['time'] == 'thang') {
                $date1 = 30;
            } else if ($_GET['time'] == 'quy') {
                $date1 = 90;
            } else if ($_GET['time'] == 'nam') {
                $date1 = 365;
            }
        } else {
            $date1 = 365;
        }
        ?>       
    <center><H1>THỐNG KÊ DOANH THU</H1></center>
    <div class='block'>
        <div class="menu_ct">   
            <ul>
                <li><a href="in_admin.php?cva=5&time=ngay">Hôm Nay</a></li>
                <li><a href="in_admin.php?cva=5&time=tuan">Tuần Này</a></li>
                <li><a href="in_admin.php?cva=5&time=thang">Tháng Này</a></li>
                <li><a href="in_admin.php?cva=5&time=quy">Quý Này</a></li>
                <li><a href="in_admin.php?cva=5&time=nam">Năm Nay</a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <center> <h4 style ='color:red'>Đang Xem Doanh Thu Theo</h4>
            <?php
            if ($date1 == 0) {
                echo'<h4 style ="color:red">Ngày</h4>';
            } else if ($date1 == 7) {
                echo'<h4 style ="color:red">Tuần</h4>';
            } else if ($date1 == 30) {
                echo'<h4 style ="color:red">Tháng</h4>';
            } else if ($date1 == 90) {
                echo'<h4 style ="color:red">Quý</h4>';
            } else if ($date1 == 365) {
                echo'<h4 style ="color:red">Năm</h4>';
            }
            ?>
        </center>
        <?php
        $now = date('y-m-d');
        $date = new DateTime($now);
        $days = $date1;
        // >= php version 5.3
        date_sub($date, date_interval_create_from_date_string($days . ' days'));
        $date_minus = date_format($date, 'Y-m-d');
        ?>
        <?php
        $thoigian = $date_minus;
        $dh = new donhang();
        $list_dh = $dh->dh_tc_date($thoigian);
        $i = 0;
        if ($list_dh) {
            $slgdon = 0;
            $slgsp = 0;
            $thu = 0;
            while ($result = $list_dh->fetch_assoc()) {
                $i++;
                $slgdon = $slgdon + 1;
                ?>
                <?php
                $id = $result['MaDH'];
                $ctdh = $dh->dem_slg($id);
                $j = 0;
                $price = 0;
                $slg = 0;
                while ($result2 = $ctdh->fetch_assoc()) {
                    $j++;
                    $price1 = $result2['SoLuong'] * $result2['DonGia'];
                    $slg = $slg + $result2['SoLuong'];
                    $price = $price + $price1;
                    $tongtien = number_format($price);
                }
                $slgsp = $slgsp + $slg;
                $thu = $thu + $price;
                $tongthu = number_format($thu);
            }
        }
        ?>
        <div class="conten">
            <div id="sanpham"> 
                <h1>ĐƠN HÀNG</h1>
                <a>Tổng Cộng</a>
                </br>
                <a><?php if(isset($slgdon)){echo $slgdon;}else{echo'0';} ?> Đơn Hàng</a>
            </div>
            <div id="sanpham"> 
                <h1>SẢN PHẨM BÁN RA</h1>
                <a>Tổng Cộng</a>
                </br>
                <a><?php if(isset($slgsp)){echo $slgsp;}else{echo'0';} ?> Sản Phẩm</a>
            </div>
            <div id="sanpham">    
                <h1>DOANH THU $</h1>
                <a>Tổng Cộng</a>
                </br>
                <a><?php if(isset($tongthu)){echo $tongthu;}else{echo'0';} ?> VNĐ</a>
            </div>
        </div>
        <div class="clear"></div>
        <center><h3 style="margin-bottom:15px;">Bảng Chi Tiết</h3></center>        
        <!----------donhang-------->
        <table class="" id="example">
            <h2>ĐƠN HÀNG</h2>
            <tr class="odd gradeX">
                <th>STT</th>
                <th>Mã Đơn Hàng</th>   
                <th>Số Lượng Sản Phẩm Mua</th>
                <th>Tổng Tiền</th>
            </tr>
            <?php
            $now = date('y-m-d');
            $date = new DateTime($now);
            $days = $date1;
            date_sub($date, date_interval_create_from_date_string($days . ' days'));
            $date_minus = date_format($date, 'Y-m-d');
            ?>
            <?php
            $thoigian = $date_minus;
            $dh = new donhang();
            $list_dh = $dh->dh_tc_date($thoigian);
            $i = 0;
            if ($list_dh) {

                while ($result = $list_dh->fetch_assoc()) {
                    $i++;
                    ?>
                    <?php
                    $id = $result['MaDH'];
                    $ctdh = $dh->dem_slg($id);
                    $j = 0;
                    $price = 0;
                    $slg = 0;
                    while ($result2 = $ctdh->fetch_assoc()) {
                        $j++;
                        $price1 = $result2['SoLuong'] * $result2['DonGia'];
                        $slg = $slg + $result2['SoLuong'];
                        $price = $price + $price1;
                        $tongtien = number_format($price);
                    }
                    ?>
                    <tr class="odd gradeX"> 
                        <td><?php echo $i ?></td>
                        <td><?php
                            echo'#MSDH';
                            echo $result['MaDH']
                            ?></td>
                        <td><?php
                            echo $slg;
                            echo' Sản Phẩm'
                            ?></td>
                        <td><?php
                            echo $tongtien;
                            echo" vnđ";
                            ?></td> 
                        <?php
                    }
                }
                ?>
            </tr>
        </table>
    </div>
</body> 
</html>
