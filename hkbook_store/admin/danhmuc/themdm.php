<?php include '../classes/category.php';?> 
                <h2>Thêm danh mục sách</h2>      
               <div class="block copyblock">                 
                 <form action="danhmuc/update.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="ma_dm" placeholder="Nhập mã danh mục" class="medium" />
                                <input type="text" name="ten_dm" placeholder="Nhập tên danh mục" class="medium" />

                            </td>
                        </tr>
			<tr> 
                            <td>
                                <input type="submit" name="them" Value="Cập Nhật" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
