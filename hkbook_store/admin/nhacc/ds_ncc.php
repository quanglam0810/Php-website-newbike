<style>
    .block{
    }
    .block table tr td{
       border: 1px solid #004a80;
    }
</style>
<?php include '../classes/nhacungcap.php'; ?>
<?php
$ncc = new nhacungcap();
?>
<div class="block">        
    <table class="data display datatable" id="example">
        <thead>
            <tr>
                <th>STT.</th>
                <th>Mã Nhà Cung Cấp</th>
                <th>Tên Nhà Cung Cấp</th>
                <th>SDT</th>
                <th>Địa Chỉ</th>
                <th>Email</th>             
                <th style='width:150px;'>Cập Nhật</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $show = $ncc->show_nhacc();
            if ($show) {
                $i = 0;
                while ($result = $show->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['MaNCC']; ?></td>
                        <td><?php echo $result['TenNCC']; ?></td>
                        <td><?php echo'0';echo $result['SDT']; ?></td>
                        <td><?php echo $result['DiaChi']; ?></td>
                        <td><?php
                            echo $result['Email'];
                            ?>                         
                        </td>                      
                        <td><button style='background:green;color:#FFF'>Update</button><a onclick = "return confirm('Bạn muốn xóa nhà cung cấp này')" href="nhacc/update.php?delid=<?php echo $result['MaNCC'] ?>"><button style='background:#400;color:#FFF'>Xóa</button></a></td>
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

