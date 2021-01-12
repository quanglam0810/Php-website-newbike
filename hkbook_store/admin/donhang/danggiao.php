<?php include '../classes/donhang.php'; ?>
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
        
        
    }
</style>
<table class="data display datatable" id="example">
    <thead>
    <h2>ĐƠN HÀNG ĐANG GIAO</h2>
    <tr class="odd gradeX">
        <th>STT</th>
        <th>Mã Đơn Hàng</th>
        <th>Tên Người Nhận</th>
        <th>Ngày Đặt</th>
        <th>Điện Thoại</th>
        <th>Địa Chỉ Nhận Hàng</th>
        <th>Tình Trạng</th>
        <th>Chi Tiết </th>
        <th>Cập Nhật</th>       
    </tr>
</thead>
<tbody>
    <?php
    $list_dh = $donhang->dh_danggiao();
    $i = 0;
    $dem=0;
    if ($list_dh) {

        while ($result = $list_dh->fetch_assoc()) {
            $i++;
            $dem++;
            ?>
            <tr class="odd gradeX"> 
                <td><?php echo $i ?></td>
                <td><?php echo'#MSDH';echo $result['MaDH'] ?></td>
                <td><?php echo $result['HoTenNN'] ?></td>
                <td><?php echo $result['NgayLap'] ?></td>
                <td><?php echo $result['SDT'] ?></td>
                <td><?php echo $result['DiaChiNN'] ?></td>
                <td><?php echo $result['TrangThai'] ?></td>
                <td><a href ='in_kho.php?ctd=<?php echo $result["MaDH"]?>'><button>Xem</button></a></td>
                <td><form action="donhang/update.php" method="POST">
                        <button name ='tc' type='submit'value='<?php echo $result["MaDH"]?>'>Giao TC</button>             
                        <button name='tb' type='submit' value='<?php echo $result["MaDH"]?>'>Giao TB</button><?php?></form></td>
                <?php
            }
        }
        ?>
    </tr>
</tbody>
<p style="color:red">Có <?php echo $dem;?> Đơn Hàng Đang vận chuyển</p>
</table>
