<?php include '../classes/nhanvien.php';?> 
        <?php
        if(isset($_GET['erro_tk']))
        {
            echo "<script>alert('Mã Nhân viên đã tồn tại','thử lại')</script>";
        }
        else if(isset($_GET['erro_id'])){
            echo "<script>alert('Tài khoản đã được dùng','thử lại')</script>";
             }
        ?>
                <h2>Thêm Nhân Viên</h2>      
               <div class="block copyblock">                 
                 <form action="nhanvien/update.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                </p><input type="text" name="ma_nv" placeholder="Nhập mã nhân viên" class="medium" />
                                <input type="text" name="ten_nv" placeholder="Nhập tên nhân viên" class="medium" />
                                <input type="text" name="ten_tk" placeholder="Nhập tên tài khoản" class="medium" />
                                <p>Chọn Chức vụ: </p>
                                <select name="quyen" >
                                    <option value='3'>Nhân Viên Kho</option>
                                    <option value='2'>Nhân Viên Bán Hàng</option>
                                </select>
                            </td>
                        </tr>
			<tr> 
                            <td>
                                <input style='background: #004a80;color: #FFF;float: right;margin-right: 50px;'type="submit" name="them" Value="Cập Nhật" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>