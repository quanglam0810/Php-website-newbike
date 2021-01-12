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
    }
    .block button{
        background:#002142;
        color: #FFF;
        border-radius: 5px;
        height: 27px;               
    } 
    .block table tr td{
       border: 1px solid #004a80;
    }
</style>
<table class="data display datatable" id="example">
    <thead>
    <h2>ĐƠN HÀNG BỊ HỦY</h2>
    <tr class="odd gradeX">
        <th>STT</th>
        <th>Mã Đơn Hàng</th>
        <th>Tên Người Nhận</th>
        <th>Ngày Đặt</th>
        <th>Điện Thoại</th>
        <th>Địa Chỉ Nhận Hàng</th>
        <th>Tình Trạng</th>
        <th>Chi Tiết Đơn Hàng</th>          
    </tr>
</thead>
<tbody>
    <?php
    $list_dh = $donhang->dh_bihuy();
    $i = 0;
    if ($list_dh) {

        while ($result = $list_dh->fetch_assoc()) {
            $i++;
            ?>
            <tr class="odd gradeX"> 
                <td><?php echo $i ?></td>
                <td><?php echo'#MSDH';echo $result['MaDH'] ?></td>
                <td><?php echo $result['HoTenNN'] ?></td>
                <td><?php echo $result['NgayLap'] ?></td>
                <td><?php echo $result['SDT'] ?></td>
                <td><?php echo $result['DiaChiNN'] ?></td>
                <td><?php echo $result['TrangThai'] ?></td>
                <td><a href ='in_nv.php?ctd=<?php echo $result["MaDH"]?>'><button>Xem Chi Tiết</button></a></td>               
                <?php
            }
        }
        ?>
    </tr>
</tbody>
</table>
