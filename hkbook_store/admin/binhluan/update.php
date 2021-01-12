<?php include '../../classes/khachhang.php'; ?>
<?php
$kh = new khachhang();
?>
<?php
    if(isset($_POST['stt_remove']))
    {
        $id=$_POST['stt_remove'];
        $tv = $kh->update_stt_rm($id);
        header('location:../in_nv.php?cv=3');
       
        
    }
    else if(isset($_POST['stt_active']))
    {
        $id=$_POST['stt_active'];
       
        $tv = $kh->update_stt_ac($id);
      header('location:../in_nv.php?cv=3');
    }
    else{
        echo'Lỗi, chức năng này chưa làm';
    }
?>