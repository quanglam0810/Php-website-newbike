<head>
    <style>
        .wrap{

        }
        .muahang{
            width:70%;
            height:auto;
            margin-left: auto;
            margin-right: auto;
            background:#FFF;
            border: dashed 1px #363636;
        }
        .thanhtoan{           
            width: 95%;            
            margin-right: auto;
            margin-left: auto;          
            margin-bottom: 30px;
            border-radius: 10px;
        }
        .thanhtoan h1{
            color: #0B86AA;
            font-size: 2em;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .thanhtoan h3{
            color: #0B86AA;
            font-size: 1.2em;
        }
        .thanhtoan p{
            color: #DD0F0E;
            margin-left: 10px;
            margin-top: 5px;

        }
        .diachi {
            margin-bottom: 10px;
            margin-left: 20px;
        }
        .diachi button{
            padding: 5px;
            background: #004a80;
            color: #fff;
            border-radius: 2px;
        }
        .form-{           
            width: 95%;
            margin-left: auto;
            margin-right: auto;        
        }
        .form- table{          
            border-radius: 5px;
            border: 1px solid #444; 
            margin-bottom: 25px;

        }
        .form- table tr td{ 
            padding: 5px;

        }
        .form- table tr text{          
            color:#0B86AA;
        }
        .form- table input{
            width:100%;
            height:30px;
            margin-bottom: 5px;
        }
        .form- button{
            float: right;    
            background: #004a80;
            color:#fff;
            font-size: 0.8em;
            padding: 5px;
            margin-top: 5px;
            margin-right: 20px;
            border-radius: 5px;
        }       
    </style>
</head>
<body>  
    <?php
    $connect = mysql_connect("localhost", "root", "");
    $csdl = "book_store";
    mysql_select_db($csdl, $connect);
    mysql_query("set names 'utf8'");
    session_start();
    ?>
    <?php
    include_once ('inc/header.php');
    ?>
    <div class="wrap">
        <div class="clear"></div>
        <div class="muahang">
            <div class='thanhtoan' >
                <center><h1>THÔNG TIN THANH TOÁN</h1></center>               
                <h3>TÓM TẮT ĐƠN HÀNG:</h3>
                <?php
                if (isset($_SESSION['product'])) {
                    $total = 0;
                    $count = 0;
                    foreach ($_SESSION['product'] as $cart_itm) {
                        $dem = $cart_itm["qty"];
                        $count = $count + $dem;
                        $subtotal = ($cart_itm["price"] * $cart_itm["qty"]);
                        $total = ($total + $subtotal);
                    }
                    echo "<p>Đơn hàng có: $count sản phẩm</p>";
                    $total = number_format($total, 0, ",", ".");
                    echo"<p>Tạm tính: $total vnđ</p>";
                } else {
                    echo"<p>Không có sản phẩm nào</p>";
                }
                ?>
                <?php
                if (isset($_SESSION['dangnhap'])) {
                    $hoten = $_SESSION['dangnhap'];
                    $sql = "select*from khachhang where HoTen='$hoten'";
                    $sql_tv = mysql_query($sql);
                    while ($row_tv = mysql_fetch_array($sql_tv)) {
                        $ten = $row_tv['HoTen'];
                        $email = $row_tv['Email'];
                        $sdt = $row_tv['SDT'];
                        $diachi = $row_tv['DiaChi'];
                    }
                } else {
                    $ten = '';
                    $sdt = '';
                    $email = '';
                    $diachi = '';
                }
                ?>

                <h3 style="margin-top:10px;">CHỌN HÌNH THỨC THANH TOÁN:</h3>  
                <input type="radio" name="dc" value="yes">Trả sau: Thanh toán khi nhận được hàng(COD).
                </br>
                <input type="radio" name="dc" value="yes">Trả trước: Thanh toán qua tài khoản ngân hàng đã liên kết.                   
                </p>
                <h3 style="margin-top:10px;">HÌNH THỨC VẬN CHUYỂN:</h3>  
                <input type="radio" name="dc2" value="yes">Tiêu chuẩn: 3 đến 7 ngày(miễn phí).
                </br>
                <input type="radio" name="dc2" value="yes">Giao hàng nhanh(phí: 20.000 vnđ).                   
            </div>  
            <div class="diachi">
                <a href="thanhtoan.php?dc=1"><button>GIAO ĐẾN ĐỊA CHỈ MẶC ĐỊNH</button></a>
                <a href="thanhtoan.php?dc=2"><button>GIAO ĐẾN ĐỊA CHỈ KHÁC</button></a>
            </div>
            <div class="form-">                 
                <form action="check_out.php" method="POST">
                    <?php
                    if (isset($_GET['dc']) && $_GET['dc'] == 1) {
                        ?>
                        <?php
                        echo "                                    
                                    <table>                                        
                                        <tr>
                                            <td>Tên khách hàng</td>
                                            <td>:</td>
                                            <td>$ten</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>$email</td>
                                        </tr>
                                        <tr>
                                            <td>Số Điện Thoại</td>
                                            <td>:</td>
                                            <td>$sdt</td>
                                        </tr>
                                        <tr>
                                            <td>Địa Chỉ Nhận Hàng</td>
                                            <td>:</td>
                                            <td>$diachi</td>                            
                                        </tr>
                                    </table>  
                                        ";
                    } else {
                        ?>
                        <?php echo'
                                    <table>  
                                        <input type="hidden" name="dc">
                                        <tr><td> Họ Tên Người Nhận</td>
                                            <td><input type="text" name="ten"></td></tr>
                                        <tr><td>Số Điện Thoại Người Nhận</td>
                                            <td><input type="text" name="sdt"></td></tr>
                                        <tr><td>Email</td>
                                            <td> <input type="text" name="email"></td></tr>
                                        <tr><td>Địa Chỉ Nhận Hàng</td>
                                            <td><textarea name="diachi" rows="2" cols="60"></textarea></td></tr>
                                    </table> 
                                      ';
                    } ?>
                    <table>
                        <a href="giohang.php"><button style='float:left;margin-left:250px;'type="button">HỦY BỎ</button></a> 
                        <?php
                        if (isset($_SESSION['dangnhap'])) {
                            if (isset($_SESSION['product'])) {
                                echo"
                                          <button name='ok' type='submit' style='float:left'>XÁC NHẬN MUA HÀNG</button>";
                            }
                        }
                        ?>
                    </table>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php
include_once ('inc/footer.php');
?>
</body>

