<style>
    .block{
    }
    .block table tr td{
        border: 1px solid #004a80;
    }
    .block table tr td button{
        background: #002142;
        color: #FFF;
    }
</style>
<?php include '../classes/phieunhap.php'; ?>
<?php include '../classes/product.php'; ?>
<?php include '../classes/nhanvien.php'; ?>
<?php
$pn = new phieunhap();
?>
<h2 style="margin-top: -50px;">Xem Phiếu Nhập Hàng</h2>
<div class="block">        
    <table class="data display datatable" id="example">
        <thead>
            <tr>
                <th>STT.</th>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng Nhập</th>    
                <th>Đơn Giá Nhập</th>              
            </tr>
        </thead>
        <tbody>
            <?php
            $id = $_GET['idpn'];
            $show = $pn->show_ctphieu_id($id);
            if ($show) {
                $i = 0;
                $tong = 0;
                while ($result = $show->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">                       
                        <td><?php echo $i; ?></td>   
                        <?php
                        $masp = $result['MaSP'];
                        $pd = new product();
                        $tv = $pd->show_product_id($masp);
                        $tv2 = $tv->fetch_assoc();
                        $tensp = $tv2['TenSP'];
                        ?>
                        <td><?php echo"#MSPS";echo $result['MaSP']; ?></td>   
                        <td><?php echo $tensp; ?></td>
                        <td><?php echo $result['SoLuongNhap']; ?></td>
                        <td><?php echo $result['DonGiaNhap']; ?></td>                      
                    </tr>                
                <?php
                $tong = $tong + ($result['DonGiaNhap']*$result['SoLuongNhap']);
                $tong1 = number_format($tong);
            }
            echo'</tbody>';
            echo'<tr><p style="color:red;font-size:1.2em;">Tổng Tiền Nhập Hàng: ';
            echo $tong1;
            echo'  Việt Nam Đồng</p></tr>';
        }
        ?>                         
    </table>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

