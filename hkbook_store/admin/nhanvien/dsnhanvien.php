<style>
    .block{
    }
    .block table tr td{
       border: 1px solid #004a80;
    }
</style>
<?php include '../classes/nhanvien.php'; ?>
<?php
// gọi class 
$nv = new nhanvien();
if (isset($_GET['add'])) {
    echo "<script>alert('Thêm tài khoản nhân viên thành công')</script>";
} else if(isset($_GET['eror'])){
    echo "<script>alert('Thêm tài khoản nhân viên thất bại')</script>";
}
?>      
<div class="block">  
    <?php
    if (isset($del)) {
        echo $del;
    }
    ?>      
    <table class="data display datatable" id="example">
        <thead>
            <tr>
                <th>STT.</th>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>SDT</th>
                <th>Địa Chỉ</th>
                <th>Chức Vụ</th>
                <th>Trạng Thái</th>
                <th>Thay Đổi Quyền</th>
                <th>Cập Nhật</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $show = $nv->show_nhanvien();
            if ($show) {
                $i = 0;
                while ($result = $show->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['MaNV']; ?></td>
                        <td><?php echo $result['TenNV']; ?></td>
                        <td><?php echo'0';echo $result['SDT']; ?></td>
                        <td><?php echo $result['DiaChi']; ?></td>
                        <td><?php
                            $quyen = $result['MaQuyen'];
                            if ($quyen == 1) {
                                echo 'ADMIN';
                            } else if ($quyen == 2) {
                                echo 'Nhân Viên Bán Hàng';
                            } else if ($quyen == 3) {
                                echo 'Nhân Viên kho';
                            }
                            ?>                         
                        </td>
                        <td><?php
                            $tt = $result['TrangThai'];
                            if ($tt == 1) {
                                echo'Đang hoạt động';
                            } else {
                                echo'Bị khóa';
                            }
                            ?></td>
                        <td>
                            <form action='nhanvien/update.php' method='POST'><button style='background:green;color:#FFF' name='update'>Update</button>
                                <input type="hidden" name='id' value="<?php echo $result['MaNV'];?>">
                                 <select name="quyen" >
                                    <option>Chọn chức vụ</option>
                                    <option value='3'>Nhân Viên Kho</option>
                                    <option value='2'>Nhân Viên Bán Hàng</option>
                                    </select>
                            </form>
                        </td>
                            <td>
                            <?php
                            if ($tt == 1) {
                                $ma=$result['MaNV'];
                                echo"<a href='nhanvien/update.php?id=$ma&tt=1'><button style='background:#400;color:#FFF'>Khóa</button></a>";
                            } else {
                                 $ma=$result['MaNV'];
                                 echo"<a href='nhanvien/update.php?id=$ma&tt=2'><button style='background:green;color:#FFF'>Mở TK</button></a>";
                            }
                            ?>
                            </td>
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

