<?php include '../../classes/category.php';  ?>
<?php
// gọi class category
$cat = new category();
if (!isset($_GET['delid']) || $_GET['delid'] == NULL) {
} else {
    $id = $_GET['delid']; // Lấy catid trên host
    $delCat = $cat->del_category($id); // hàm check delete Name khi submit lên
     header('location:../in_kho.php?cvk=6');
}
?>    
<!-- Thêm danh mục -->
<?php
// gọi class category
$cat = new category();
if (isset($_POST['them'])) {   
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $id=$_POST['ma_dm'];
        $Name =$_POST['ten_dm'];
        $insertCat = $cat->insert_category($id,$Name); // hàm check catName khi submit lên
        header('location:../in_kho.php?cvk=6');
    }
?>      