<style>
    .block{
        margin-top: -20px;     
    }
    .block table.phieunhap
    {
        border:2px solid #002142;
        height:100px;width:300px;
        padding:5px;    
    }
    .block table.phieunhap td
    {

        padding:5px;    
    }

</style>
<?php include '../classes/category.php'; ?>
<?php include '../classes/author.php'; ?> 
<?php include '../classes/product.php'; ?>
<?php
?>
<h2 style='margin-top: -20px;margin-bottom: 5px;'>Nhập Hàng</h2>
<table class='phieunhap'>
    <tr><td style='font-size:1.2em;color: #0063DC'>Thông Tin Phiếu Nhập</td><td></td></tr>
    <tr><td>Mã Phiếu Nhập</td><td><?php
            if (isset($_SESSION['mapn'])) {
                echo $_SESSION['mapn'];
            } else {
                echo"Error: NOT FOUND";
            }
            ?></td></tr>
    <tr><td>Nhân Viên</td><td><?php
            if (isset($_SESSION['name_nv'])) {
                echo $_SESSION['name_nv'];
            } else {
                echo"Bạn chưa đăng nhập";
            }
            ?> </td></tr>
</table>          
<div class="block">
    <form action="sanpham/update-sp.php" method="POST" enctype="multipart/form-data">
        <table class="form">               
            <tr>
                <td>
                    <label>Tên sản phẩm</label>
                </td>
                <td>
                    <input name="tensp" type="text" placeholder="Nhập tên sản phẩm..." class="medium" />
                </td>
            </tr>                           
            <tr>
                <td>
                    <label>Danh mục sản phẩm</label>
                </td>
                <td>
                    <select id="select" name="loaisp">
                        <option>Danh mục sản phẩm</option>
                        <?php
                        $cat = new category();
                        $catlist = $cat->show_category();
                        if ($catlist) {
                            while ($result = $catlist->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $result['MaLoai'] ?>"> <?php echo $result['TenLoai'] ?> </option>

                                <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tác Giả</label>
                </td>
                <td>
                    <select id="select" name="tacgia">
                        <option>Tác giả</option>
                        <?php
                        $au = new author();
                        $list = $au->show_author();
                        if ($list) {
                            while ($result = $list->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $result['MaTG'] ?>"> <?php echo $result['TenTG'] ?> </option>

        <?php
    }
}
?>
                    </select>
                </td>
            </tr>                              
            <tr>
                <td>
                    <label>Giá</label>
                </td>
                <td>
                    <input name="gia" type="text" placeholder="Nhập giá..." class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Tải ảnh</label>
                </td>
                <td>
                    <input name="anh" type="file" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Số lượng nhập</label>
                </td>
                <td>
                    <input name="soluong" type="text" placeholder="Nhập số lượng sản phẩm..." class="medium" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nhà xuất bản</label>
                </td>
                <td>
                    <input name="nxb" type="text" placeholder="Nhập tên nhà xuất bản..." class="medium" />
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                    <label>Mô tả</label>
                </td>
                <td>
                    <textarea name="mota" class="tinymce"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Giảm giá</label>
                </td>
                <td>
                    <input name="giamgia" type="number" placeholder="Nhập mức giảm giá(đơn vị %)" class="medium" />
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input style = "float:right;margin-right: 200px;background: #004a80;color:#fff;"type="submit" name="insert_sp" Value="Cập Nhật" />
                </td>
            </tr>
        </table>
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



