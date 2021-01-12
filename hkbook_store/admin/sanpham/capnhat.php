<style>
    .block{

    }
    .block table tr td {
        border:2px solid cornflowerblue;
        text-align: center;
    }
    .block table tr td a button{
        background: #0063DC;
        color: #FFF;
        border-radius: 5px;
    }
</style>
<?php include '../classes/category.php'; ?>
<?php include '../classes/author.php'; ?> 
<?php include '../classes/product.php'; ?>
<?php require_once '../helpers/format.php'; ?>
<?php
$pd = new product();
$fm = new Format();
?>
<h2>Cập nhật sản phẩm</h2>
<div class="block">    
    <table class="data display datatable" id="example">		
        <thead>
            <tr>
                <th>Hình Ảnh</th>	
                <th>Mã sản phẩm</th>					
                <th>Tên sản phẩm</th>					
                <th>Số lượng</th>					                                    
                <th>Giá bán</th>
                <th>Giảm Giá</th>                                    
            </tr>
        </thead>
        <?php
        $id = $_GET['id'];
        $list = $pd->getproductby_Id($id);
        $result = $list->fetch_assoc();
        ?>
        <form action="sanpham/update-sp.php" method="POST">
            <tr class="odd gradeX">

                <td><img src="../images/<?php echo $result['Hinh'] ?>"height="80" width="60"></td>
                <td><?php echo '#SPS';
        echo $result['MaSP']
        ?></td>
                <td><?php echo $result['TenSP'] ?></td>				
                <td><input type ="text" name="soluong" placeholder="<?php echo $result['SoluongCon'] ?>"></td>										 				
                <td><input type ="text" name="gia" placeholder="<?php echo $result['DonGia'] ?>Việt Nam Đồng"></td>
                <td><input type ="text" name="giamgia" placeholder="<?php echo $result['GiamGia'] ?>(%)"></td> 
            </tr>
            <tr class="odd gradeX"> 
                <td>
                    <button type="submit" name="oke">Cập Nhật</button>
                </td>
                
                    <input type="hidden" name="id" value="<?php echo $result['MaSP'] ?>"/>
                
            </tr>
        </form>
        </tbody>
    </table>
</div>