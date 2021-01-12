<style>
    .block{
        margin-top: -20px;
        
    }
</style>
<?php include '../classes/author.php';  ?>      
                <h2>Thêm Tác Giả</h2>      
               <div class="block copyblock">               
                 <form action="tacgia/update.php" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="tentg" placeholder="Nhập tên tác giả" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="info" placeholder="nhập thông tin tác giả" style="width: 90%;height:100px"></textarea>
                            </td>
                        </tr>
			<tr> 
                            <td>
                                <input type="submit" name="insert" Value="Cập Nhật" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
