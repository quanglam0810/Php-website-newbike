<style>
    .block{
        margin-top: -20px;
        
    }
</style>
<?php include '../classes/category.php';  ?>   
                <h2>Danh mục sản phẩm</h2>
                <div class="block">  
                <?php 
                   $cat = new category();
                 ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Stt.</th>
							<th>Tên thể loại sách</th>
							<th>Xử lý</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_cat = $cat ->show_category();
							if($show_cat){
								$i = 0;
								while($result = $show_cat -> fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td style="font-weight: bold;font-size:0.9em;"><?php echo $result['TenLoai']; ?></td>
                                                        <td><button style='background: #004a80;color:#FFF'>Update</button><a onclick = "return confirm('Bạn có chắc muốn xóa???')" href="danhmuc/update.php?delid=<?php echo $result['MaLoai'] ?>"><button style='background:#500;color:#FFF'>Xóa</button></a></td>
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

