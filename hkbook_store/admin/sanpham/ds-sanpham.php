<style>
    .block{
        
    }
    .block table tr td a button{
        background: #0063DC;
        color: #FFF;
        border-radius: 5px;
    }
</style>
<?php include '../classes/category.php';?>
<?php include '../classes/author.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$pd = new product();
	$fm = new Format();	
 ?>
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>	
                                        <th>Mã sản phẩm</th>					
					<th>Tên sản phẩm</th>					
					<th>Số lượng còn</th>
					<th>Hình ảnh</th>
                                        <th>Nhà xuất bản</th>
                                        <th>Đơn giá</th>
                                        <th>Giảm Giá</th>
                                        <th>Thao Tác</th>
				</tr>
			</thead>
			<tbody>
				<?php 				
				$pdlist = $pd->show_product();
				$i = 0;
					if($pdlist){
                                            $total = 0;
                                            $tong = 0;
                                            while ($result = $pdlist->fetch_assoc()){
								$i++;
                                                                $total= $total+1;
                                                                $tong = $tong + $result['SoluongCon'];
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo '#SPS';echo $result['MaSP'] ?></td>
					<td><?php echo $result['TenSP'] ?></td>				
					<td><?php echo $result['SoluongCon'] ?></td>										
                                        <td><img src="../images/<?php echo $result['Hinh'] ?>"height="80" width="60"></td>
					<td><?php echo $result['NXB'] ?></td>
					<td><?php echo $result['DonGia'] ?></td>
                                        <td><?php echo $result['GiamGia'] ?>%</td>
                                        <td><a href="in_kho.php?cvk=15&id=<?php echo $result['MaSP'] ?>"><button>Cập Nhật</button></a>
                                            <form action='sanpham/update-sp.php' method='POST'>
                                          <?php
                                         $id= $result['MaSP'];
                                         if($result['TrangThai']==1)
                                         {
                                         echo "<button style='background:green;color:#FFF;'name='change-stt1' type='submit' value='$id'>Hiển Thị</button>";
                                         }
                                         else
                                         {
                                          echo "<button style='background:red;color:#FFF;' name='change-stt2' type='submit' value='$id'>Ẩn SP</button>";
                                         }
                                         ?>
                                            </form>
                                        </td>
				</tr>
				<?php
							
						
					}
                                        }
				?>
			</tbody>
                        <tr style="color:green">
                        <?php                       
                        echo'Tổng Cộng: ';echo $total;echo" Đầu sách";
                        ?>
                        </tr>
                        <tr style="background:green">
                        <?php                       
                        echo'|| Còn: ';echo $tong;echo" Sản Phẩm";
                        ?>
                        </tr>
                        </br>                       
		</table>
                    

       </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
