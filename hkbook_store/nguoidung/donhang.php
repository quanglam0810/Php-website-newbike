<?php
$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
?>
<?php
$info = $_SESSION['makh'];
$sql = "select * from donhang where MaKH='$info' order by MaDH desc";
$run_cart = mysql_query($sql);
?>
<style>
    body
        {
          
        }       
    .don table{
        border:2px solid black;;
        width:99%;
        padding: 5px;
        margin-left: auto;
        margin-right: auto;
    }
    .don table tr#label{
        background: #004a80;
        font-weight:bold;
        color: #FFF;
        font-size:0.8em;
        text-align:center;      
    }
    .don table tr td{
        border:1px solid black;              
        height: 35px;
        padding:3px;
        text-align:left;      
    } 
    .don table tr td button{
        width: 90px; 
        height: 30px;
        border-radius: 5px;
        background: #004a80;
        color: #fff;
    }    
</style>
<div class="don">
    <table>
        <tr>
        <div align="center" ><h1 style="color:#0063DC;font-size: 1.5em;">ĐƠN HÀNG CỦA BẠN</h1><br><p style="color: red;font-size:1.3em;">*Chú ý: đơn hàng chỉ được hủy khi chưa được xác nhận và vận chuyển.</p></br></div>
        </tr>
        <tr id="label">
            <td>STT</td>
            <td>MÃ ĐƠN</td> 
            <td>NGÀY ĐẶT HÀNG</td>   
            <td>ĐỊA CHỈ NHẬN HÀNG</td> 
            <td>ĐIỆN THOẠI</td>
            <td>TÊN NGƯỜI NHẬN</td>
            <td>TÌNH TRẠNG</td>   
            <td>THAO TÁC</td>
            <td>HỦY ĐƠN</td> 
        </tr>
        <?php
        $i = 0;
        while ($dong_cart = mysql_fetch_array($run_cart)) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php
                    $madon = $dong_cart['MaDH'];
                    echo '#MSDH';
                    echo $madon;
                    ?></td>  
                <td><?php echo $dong_cart['NgayLap'] ?></td>    
                <td><?php echo $dong_cart['DiaChiNN'] ?></td>
                <td><?php echo'0';
                    echo $dong_cart['SDT'] ?></td> 
                <td><?php echo $dong_cart['HoTenNN'] ?></td>
                <td><?php
                    $trangthai = $dong_cart['TrangThai'];
                    echo $trangthai
                    ?></td>
                <td width="25"><a href="profile.php?ctd=<?php echo$dong_cart['MaDH'] ?>"><button>CHI TIẾT</button></a></td>
                <td><form method="POST" action="nguoidung/huydon.php">
                        <?php
                        echo"<input type='hidden' name='id' value='$madon'>";

                        if ($trangthai == 'đang xử lí') {
                            echo'<button type="submit" name="huy">HỦY ĐƠN</button></form></td>';
                        } //}                        
                        ?>  </td></form>
            </tr>

            <?php
            $i++;
        }
        ?>
    </table> 
</div>