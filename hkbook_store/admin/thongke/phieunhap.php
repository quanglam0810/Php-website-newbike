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
<?php include '../classes/nhacungcap.php'; ?>
<?php
$pn = new phieunhap();
?>
<h2 style="margin-top: -50px;">Xem Phiếu Nhập Hàng</h2>
<div class="block">        
    <table class="data display datatable" id="example">
        <thead>
            <tr>
                <th>STT.</th>
                <th>Mã Nhà Phiếu Nhập</th>
                <th>Nhà Cung Cấp</th>
                <th>Nhân Viên Nhập Hàng</th>    
                <th>Ngày Nhập Hàng</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $show = $pn->show_phieu();
            if ($show) {
                $i = 0;
                while ($result = $show->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">                       
                        <?php
                            $idnv=$result['MaNV'];
                            $idncc=$result['MaNCC'];
                            $nv= new nhanvien();
                            $ncc = new nhacungcap();
                            $nhanvien= $nv->show_nhanvien_id($idnv);
                            $kq1= $nhanvien->fetch_assoc();
                            $tennv = $kq1['TenNV'];
                            $ncc1 = $ncc->show_nhacc_id($idncc);
                            $kq2= $ncc1->fetch_assoc();
                            $tenncc = $kq2['TenNCC'];
                        ?>
                        <td><?php echo $i; ?></td>                       
                        <td><?php echo $result['MaPN']; ?></td> 
                        <td><?php echo $tenncc; ?></td>
                        <td><?php echo $tennv ;?></td>
                        <td><?php echo $result['NgayLap']; ?></td>
                        <td><a href="in_admin.php?cva=9&idpn=<?php echo $result['MaPN'];?>"><button>Xem chi tiết</button></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

