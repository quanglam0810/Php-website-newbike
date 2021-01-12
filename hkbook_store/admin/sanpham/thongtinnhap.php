<style>
    thead tr th{
        color: #FFF;
        width: 25%;
    }   
</style>
<center><H1>THÔNG TIN NHẬP HÀNG</H1></center>
<h3>
    <?php
    if(isset($_GET['trungsp']))
    {
        echo"<script>alert('Sản phẩm đã có trong phiếu nhập')</script>";
    }
    ?>
    <?php
    if(isset($_SESSION['mapn'])){
        $ma = $_SESSION['mapn'];
        echo "<h3>Mã Phiếu Nhập: $ma</h3>";
    }
    else{
    echo"<h3>ERROR</h3>";
    }
        $ncc = $_SESSION['cungcap'];
        echo "MÃ NHÀ CUNG CẤP: ";echo $ncc;
    ?>
<div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th style='width:30px;'>STT</th>
                                        <th>Hình Ảnh</th>
					<th>Tên Sản Phẩm</th>					
					<th>Số Lượng Nhập</th>					
                                        <th>Đơn Giá Nhập</th>                                      
				</tr>
			</thead>
			<tbody>  
                            
<?php
    if(isset($_SESSION['phieunhap'])){
        $i=0;
    foreach ($_SESSION['phieunhap'] as $value) {
        $i++;
        $anh = $value['hinh'];
        ?>          <tr class="odd gradeX" style='text-align: center'>
                                <td><?php echo $i?></td>
                                <td><img src="../images/<?php echo$anh;?>" alt="IMG" width="50" height="70"></td>                       
                                <td><?php echo $value['tensp'];?></td>
                                <td><?php echo $value['soluong'];?></td>
                                <td><?php echo $value['gia'];echo' vnđ'?></td>
                                <tr class="odd gradeX">                                   
    <?php
    }
    }
    else{
            echo'Phiếu Nhập Rổng';
    }
?>
                                     </tbody>                                                  
                        </table>
    <a href='../admin/in_kho.php?cvk=13'><button style='background: #002752;color:#FFF;padding:5px'>TIẾP TỤC</button></a>
    <a href='../admin/in_kho.php?cvk=9'><button style='background: #002752;color:#FFF;padding:5px'>KẾT THÚC</button></a>
 </div>