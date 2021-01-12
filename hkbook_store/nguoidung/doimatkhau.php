<?php
$connect = mysql_connect("localhost", "root", "");
$csdl = "book_store";
mysql_select_db($csdl, $connect);
mysql_query("set names 'utf8'");
?>
<?php
$info = $_SESSION['makh'];
$sql = "select * from khachhang where MaKH='$info'";
$run_cart = mysql_query($sql);
?>
<?php
while ($dong_cart = mysql_fetch_array($run_cart)) {
    $matkhau = $dong_cart['MatKhau'];    
}
?>
<style>     
    .main{
          
    }
    .main .mid{  
          display: non;
        width: 85%;
        margin-left: auto;
        margin-right: auto;
    }
    .main .mid h1{
        font-size: 1.5em;
        color: #004a80;
        align-content: center;
        margin-bottom: 20px;
    }
    .main .mid table{
        font-size: 1.2em;
        color:#002142;      
        padding: 10px; 
        margin-bottom: 80px;

    }
    .main .mid table tr{
        width: 90%;      
        padding: 10px;

    }
    .main .mid table tr td input{
        width:300px;      
        padding: 10px;
        height: 35px;

    }
    .main .mid table tr td#label{       
        border:1px solid white;
        padding: 10px;
        width: 250px;

    }
    .main .mid table tr td#radio input{              
        width:20px;
        height:20px;
    }
    .main .mid table tr td button{              
        width:120px;
        height:40px;
        float:right;
        margin-right: 50px;
        background:#002142;
        color: #fff;
        font-size:0.9em;
    }
</style>
<div class='mid'>
    <h1>THÔNG TIN TÀI KHOẢN</h1>
    <table border="1">
        <form action="nguoidung/update.php" method="POST">
            <tr>
                <td id='label'>Họ Tên:</td>
                <td><?php
                    echo $_SESSION['dangnhap'];
                    ?></td>
            </tr>
            <tr>
                <td id='label'>Mật khẩu cũ :</td>
                <td><input name='mk1' type='password' placeholder=""></td>
            </tr>
            <tr>
                <td id='label'>Mật khẩu mới:</td>
                <td><input name='mk2' type='password' placeholder=""></td>
            </tr>
            <tr>
                <td id='label'>Nhập lại mật khẩu mới:</td>
                <td><input name ='mk22' type='password' placeholder=""></td>
            </tr>       
            <tr> 
                <td id='label'></td>
                <td>
                    <input type='hidden' name='makh' value='<?php echo$info; ?>'>
                    <button name="updatemk" type="submit">CẬP NHẬT</button></td>
            </tr>
        </form>
    </table>
</div>