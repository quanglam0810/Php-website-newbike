<?php include '../../classes/author.php'; ?>
<?php
// gọi class author
$au = new author();
if (!isset($_GET['delid']) || $_GET['delid'] == NULL) {
     echo "<script> window.location = 'dstacgia.php' </script>";
} else {
    $id = $_GET['delid']; // Lấy catid trên host
    $del = $au->del_author($id); // hàm check delete Name khi submit lên
    header('location:../in_kho.php?cvk=8');
}
?>      