<?php include '../classes/khachhang.php'; ?>
<?php include '../classes/product.php'; ?>
<?php require_once '../helpers/format.php'; ?>
<?php
$kh = new khachhang();
$fm = new Format();
$pd = new product();
?>
<style>
      .block{
    }
     .block tr td {
         padding: 5px;
    }
    .block button{
        background:#002142;
        color: #FFF;
        border-radius: 5px;
               
    } 
    .block button#1{
        background:#491217;
        color: #FFF;                   
    }
    .block button#2{
        background:#0b2e13;
        color: #FFF;                     
    }
    .block table tr td{
       border: 1px solid #004a80;
    }
</style>
<table class="data display datatable" id="example">
    <thead>
    <h2>Bình Luận Chưa Duyệt</h2>
    <tr class="odd gradeX">
        <th>STT</th>
        <th>ID</th>
        <th width="120">Khách Hàng</th>
        <th>Sản Phẩm</th>      
        <th>Nội Dung</th>        
        <th>Thời Gian</th>   
        <th width="90">Thao Tác</th>   
    </tr>
</thead>
<tbody>
    <?php
    $list = $kh->showbinhluanall();
    $i = 0;
    if ($list) {
        while ($result = $list->fetch_assoc()) {
            $i++;
            $idbl = $result['MaBL'];
            $tenkh = $kh->showtenkh($result['MaKH']);
            $ten = $tenkh->fetch_assoc();
            $tensp = $pd->show_product_id($result['MaSP']);
            $sp = $tensp->fetch_assoc();
            ?>
            <tr class="odd gradeX"> 
                <td><?php echo"0";echo $i ?></td>
                <td><?php echo'#BL';echo $result['MaBL'] ?></td>
                <td><?php echo $ten['HoTen'] ?></td>
                <td><?php echo $sp['TenSP']?></td>             
                <td><?php echo $result['NoiDung'] ?></td>               
                <td><?php echo $result['ThoiGian'] ?></td>
                 <td><form action="binhluan/update.php" method='POST'><button name="contac">Trả Lời</button>
                         <?php
                         if($result['TrangThai']== 0){
                          echo"<button style=' background:red' type='submit' name='stt_remove' value='$idbl'>Ẩn</button>";                          
                         }
                         else{
                          echo"<button style=' background:green' type='submit' name='stt_active' value='$idbl'>Hiện</button>"; 
                         }
                         ?>
                 </td>
                <?php
            }
        }
        ?>
    </tr>
</tbody>
</table>
