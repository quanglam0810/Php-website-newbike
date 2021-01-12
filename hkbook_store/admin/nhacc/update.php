<?php include '../../classes/nhacungcap.php'; ?>
<?php

$ncc = new nhacungcap();
?>
<?php

if (isset($_GET['delid'])) {
    $id = $_GET['delid']; // Lấy catid trên host
    $del = $ncc->delete_ncc($id); // hàm check delete Name khi submit lên
    header('location:../in_admin.php?cva=4');
} else if (isset($_POST['add'])) {
    if ($_POST['mancc'] != NULL and $_POST['tenncc'] != NULL and $_POST['mail'] != NULL and $_POST['sdt'] != NULL and $_POST['dc'] != NULL) {
        $id = $_POST['mancc'];
        $name = $_POST['tenncc'];
        $mail = $_POST['mail'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['dc'];
        $query = $ncc->them_nhacc($id, $name, $sdt, $diachi, $mail);
        header('location:../in_admin.php?cva=4');
    } else {
        echo "<script>alert('Lỗi. Thêm Không Thành Công')</script>";
    }
}
?>   