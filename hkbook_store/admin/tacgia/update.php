<?php include '../../classes/author.php';  ?>
<?php
    // gọi class author
    $au = new author(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $tentg = $_POST['tentg'];
        $info =  $_POST['info'];
        $add = $au -> insert_author($tentg,$info); 
        header('location:../in_kho.php?cvk=8');
    }
  ?> 