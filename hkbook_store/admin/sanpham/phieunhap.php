<style>
    .block{
    }
    .block table.phieu{
        border: 2px solid #002142;
        width: 500px;
        height: 150px;  
        
    }
    .block table.phieu tr{
           padding: 10px;
    }
    .block table.phieu tr td{
      
    }
     .block table.phieu tr td input{
      
    }
     .block table.phieu tr td select{
      
       
    }
    .block table.phieu tr td#label{
       font-size: 1.2em;
       color: #004a80;
    }
    .block p{
        font-size:1.2em;
        color: red;
    }
    .block button{
        background: #0063DC;
        border-radius: 5px;
        color:#FFF;
        margin-left: 5px;
        font-size: 1.5em;
    }
</style>
<?php include '../classes/nhacungcap.php'; ?>
<?php include '../classes/author.php'; ?> 
<?php include '../classes/product.php'; ?>
<?php
if(isset($_GET['loi']))
{
    echo'<script>alert("Có lỗi xin thử lại")</script>';
}
else if(isset($_GET['trung'])){
    echo"<script>alert('mã phiếu nhập đã tồn tại')</script>";
}
//session_start();
// gọi class category
$ncc = new nhacungcap();
?>
<h2 style='margin-top: -20px;margin-bottom: 5px;'>Tạo Phiếu Nhập</h2>
<div class="block">
    <form action="sanpham/update-sp.php" method="POST" enctype="multipart/form-data">
        <table class="phieu">               
            <tr>
                <td id='label'>Mã Phiếu Nhập(PN***)</td>
                <td>
                    <input name="mapn" type="text" placeholder="Nhập mã phiếu nhập" />
                </td>
            </tr>                           
            <tr>
            <td id='label'>Nhà Cung Cấp</td>
                <td>
                    <select id="select" name="nhacc">
                        <option value=''>Chọn nhà cung cấp</option>
                        <?php                     
                        $list = $ncc->show_nhacc();
                        if ($list) {
                            while ($result = $list->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $result['MaNCC'] ?>"> <?php echo $result['TenNCC'] ?> </option>

                                <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
             <tr>
                <td id='label'>Nhân Viên Nhập Hàng</td>
                <td>
                    <?php
                    echo $_SESSION['name_nv'];                  
                    $manv = $_SESSION['ma_nv'];
                    ?>
                </td>
            </tr>   
        </table>
        <p>*Lưu ý: Phiếu nhập này sẻ lưu lại thông tin nhập hàng của cửa hàng hkbook. Mỗi phiếu nhập chỉ có thể nhập sản phẩm từ một nhà cung cấp</p>
        <input type='hidden' name='manv' value='<?php echo$manv;?>'>
        <button name='taophieu'>Cập Nhật</button>
    </form>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
