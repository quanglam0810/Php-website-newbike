<style>
    .block{
        margin-top: -30px;
        
    }
    .block table tr td a button{
        background: #0063DC;
        color: #FFF;
        border-radius: 5px;
    }
    .block table tr td{
        border:1px solid #002142;
    }
</style>
<?php include '../classes/author.php'; ?>
<?php
// gọi class author
$au = new author();

?>      
<div class="block"> 
    <h2> Danh Sách Tác Giả</h2>
    <table class="data display datatable" id="example">
        <thead>
            <tr>
                <th>STT.</th>
                <th style='width:140px;'>Tên Tác Giả</th>
                <th>Thông Tin</th>
                <th style='width:90px;'>Cập Nhật</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $show = $au->show_author();
            if ($show) {
                $i = 0;
                while ($result = $show->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr class="odd gradeX">
                        
                        <td><?php echo $i; ?></td>
                        <td style="text-align: center;font-weight: bold;"><?php echo $result['TenTG']; ?></td>
                        <td><?php echo $result['ThongTin'];  ?></td>
                        <td><a href=""><button>Update</button></a><a onclick = "return confirm('Bạn có muốn xóa ???')" href="tacgia/xoatg.php?delid=<?php echo $result['MaTG'] ?>"><button style='background: #400;color:#FFF'>Xóa</button></a></td>
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

