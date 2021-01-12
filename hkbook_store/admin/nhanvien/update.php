<?php include '../../classes/nhanvien.php'; ?>
<?php

$nv = new nhanvien();
?>
<?php
if (isset($_POST['them'])) {   
        $id = $_POST['ma_nv'];
        $ten = $_POST['ten_nv'];
        $tk = $_POST['ten_tk'];
        $mk = md5(123456);
        $quyen = $_POST['quyen'];
        $trangthai = '1';
        $ktid = $nv->checkma($id);        
        $kttk = $nv->checktk($tk);      
        if ($ktid) {
            header('location:../in_admin.php?cva=2&erro_tk');
        }
        if ($kttk) {
            header('location:../in_admin.php?cva=2&erro_id');
        }
        else if($id!=null&&$ten!=null&&$mk!=null&&$tk!=null)
        {
         $insert_nv = $nv->them_nhanvien($id, $ten, $tk, $mk, $quyen, $trangthai);
         if($insert_nv){
         header('location:../in_admin.php?cva=1&add');  }         
         } 
        else {
        header('location:../in_admin.php?cva=1&eror');
        }
} else if (isset($_POST['update'])&& $_POST['quyen']!=null) {
    $idnv = $_POST['id'];
    $quyennv = $_POST['quyen'];
    $updatequyen = $nv->update_q($idnv, $quyennv);
    header('location:../in_admin.php?cva=1');
} else if (isset($_GET['id']) && $_GET['tt'] == 1) {
    $idnv = $_GET['id'];
    $data = '0';
    $updatett = $nv->update_stt($idnv,$data);
    header('location:../in_admin.php?cva=1');
} else if (isset($_GET['id']) && $_GET['tt'] == 2) {
    $idnv2 = $_GET['id'];
    $data2 = '1';
    $updatett2 = $nv->update_stt($idnv2,$data2);
    header('location:../in_admin.php?cva=1');
}
?>