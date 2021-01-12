<?php include '../classes/donhang.php'; ?>
<?php include '../classes/nhanvien.php'; ?>
<?php require_once '../helpers/format.php'; ?>
<?php
$donhang = new donhang();
$fm = new Format();
?>
<style>
    .block{
    }
    .block tr td {
        padding: 5px;
        border: 1px solid #004a80;
    }
    .block button{
        background:#004a80;
        color: #FFF;
        border-radius: 5px;
        height: 30px; 
        width:120px;     
    }
</style>
<table class="data display datatable" id="example">
    <thead>
    <h2 style="margin-top:-20px;">THỐNG KÊ XUẤT HÀNG</h2>
    <tr class="odd gradeX">
        <th>STT</th>
        <th>Mã Phiếu</th>
        <th>Tên Nhân Viên</th>
        <th>Ngày Xuất</th>
        <th>Tình Trạng</th>      
        <th width="50px">Thao Tác</th>       
    </tr>
</thead>
<tbody>
    <?php
    $list_dh = $donhang->xuathang();
    $i = 0;
    if ($list_dh) {

        while ($result = $list_dh->fetch_assoc()) {
            $i++;
            ?>
            <tr class="odd gradeX"> 
                <?php
                $id = $result['MaNV'];
                $nv = new nhanvien();
                $tv = $nv->show_nhanvien_id($id);
                $tv2 = $tv->fetch_assoc();
                $tennv = $tv2['TenNV'];
                ?>
                <td><?php echo $i ?></td>
                <td><?php echo'#MSPHIEU';
        echo $result['MaDH'] ?></td>
                <td><?php echo $tennv ?></td>
                <td><?php echo $result['NgayGiao'] ?></td>              
                <td><?php
                    $tt=$result['TrangThai'];
                    if($tt==('giao thành công'))
                    {
                        echo'Giao Thành công/ Thanh toán';
                    }
                    else if($tt==('giao thất bại'))
                    {
                        echo'Giao Thất Bại/ Lưu Kho';
                    }
                    else if($tt==('đang giao hàng'))
                    {
                        echo'Đang chờ';
                    }
                    ?>
                </td>
                <td><a href ='in_admin.php?cva=10&ctd=<?php echo $result["MaDH"] ?>'><button>Xem Chi Tiết</button></a></td>                              
                <?php
            }
        }
        ?>
    </tr>
</tbody>
</table>
