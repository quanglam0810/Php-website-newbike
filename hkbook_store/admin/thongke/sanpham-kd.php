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
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>	
                                        <th>Mã sản phẩm</th>					
					<th>Tên sản phẩm</th>					
					<th>Số lượng tồn kho</th>
					<th>Hình ảnh</th>
                                        <th>Nhà xuất bản</th>
                                        <th>Giá Bán(VNĐ)</th>
                                        <th>Mức Giảm Giá(%)</th>                                     
				</tr>
			</thead>
			<tbody>
				<?php 				
				$pdlist = $pd->show_product();
				$i = 0;
                                $count=0;
					if($pdlist){
                                            while ($result = $pdlist->fetch_assoc()){
								$i++;																		
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo '#SPS';echo $result['MaSP'] ?></td>
					<td><?php echo $result['TenSP'] ?></td>				
					<td><?php echo $result['SoluongCon'] ?></td>										
                                        <td><img src="../images/<?php echo $result['Hinh'] ?>"height="80" width="60"></td>
					<td><?php echo $result['NXB'] ?></td>
					<td><?php 
                                        $gia= $result['DonGia']; 
                                        $giaban= number_format($gia);
                                        echo $giaban;?>
                                        </td>
                                        <td><?php echo $result['GiamGia'] ?>%</td>                                       
				</tr>
				<?php
							
					$count =$count+1;	
					}
                                        }
				?>
			</tbody>
                        <h2>Đang kinh doanh</h2><span style="color:red;font-size:1.2em;"><?php echo $count;?> Sản Phẩm</span>
		</table>

       </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
