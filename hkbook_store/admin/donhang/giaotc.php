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
        width:120px;     
    }
</style>
<table class="data display datatable" id="example">
    <thead>
    <h2>ĐƠN HÀNG ĐANG CHỜ XỬ LÍ</h2>
    <tr class="odd gradeX">
        <th>STT</th>
        <th>Mã Đơn Hàng</th>
        <th>Tên Người Nhận</th>
        <th>Ngày Giao</th>
        <th>Điện Thoại</th>
        <th>Địa Chỉ Nhận Hàng</th>
        <th>Tình Trạng</th>
        <th>Chi Tiết Đơn Hàng</th>
        <th>Trạng Thái</th>       
    </tr>
</thead>
<tbody>
    <?php
    $list_dh = $donhang->dh_tc();
    $i = 0;
    $dem=0;
    $slg =0;
    if ($list_dh) {

        while ($result = $list_dh->fetch_assoc()) {
            $i++;
            $dem++;           
            ?>
            <tr class="odd gradeX"> 
                <td><?php echo $i ?></td>
                <td><?php echo'#MSDH';echo $result['MaDH'] ?></td>
                <td><?php echo $result['HoTenNN'] ?></td>
                <td><?php echo $result['NgayGiao'] ?></td>
                <td><?php echo $result['SDT'] ?></td>
                <td><?php echo $result['DiaChiNN'] ?></td>
                <td><?php echo $result['TrangThai'] ?></td>
                <td><a href ='in_kho.php?ctd=<?php echo $result["MaDH"]?>'><button>Xem</button></a></td>
                <td>Đã Thanh Toán<?php?>                
                <?php
            }
        }
        ?>
    </tr>
</tbody>
<p style="color:red">Có <?php echo $dem;?> Đơn Hàng Đang Đã Quyết Toán</p>
</table>
