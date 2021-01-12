
<?php include '../../classes/category.php'; ?>
<?php include '../../classes/author.php'; ?> 
<?php include '../../classes/product.php'; ?>
<?php include '../../classes/phieunhap.php'; ?>
<?php
/// kiểm tra biến post , tạo phiếu nhập hàng.
if (isset($_POST['taophieu'])) {
    $id_pn = $_POST['mapn'];
    $pn = new phieunhap();
    $ma_pn1 = $pn->show_phieu_id($id_pn);
    if ($ma_pn1) {
        header('location:../in_kho.php?cvk=9&trung');
        
    } else if ($_POST['mapn'] != NULL && $_POST['nhacc'] != NULL && $_POST['manv'] != NULL) {
        session_start();
        $_SESSION['mapn'] = $id_pn;
        $id_nv = $_POST['manv'];
        $id_ncc = $_POST['nhacc'];
        $_SESSION['cungcap']=$id_ncc;
        $date = date('y-m-d');
        $insert_pn = $pn->them_phieu($id_pn, $id_nv, $id_ncc, $date);
        header('location:../in_kho.php?cvk=13');
    } else {
        header('location:../in_kho.php?cvk=9&loi');        
    }
    //// nhập sản phẩm
} else if (isset($_POST['insert_sp'])) {          
    if ($_POST['tensp'] != null && $_POST['loaisp'] != null && $_POST['tacgia'] != NULL && $_POST['gia'] != NULL && $_POST['soluong'] != NULL) {
        if ($_POST['giamgia'] == NULL) {
            $_POST['giamgia'] = 0;
        } else {
            $_POST['giamgia'];
        }
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['anh']['name'];
        $file_size = $_FILES['anh']['size'];
        $file_temp = $_FILES['anh']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = $file_name;
        $uploaded_image = "../../images/" . $unique_image;
        move_uploaded_file($file_temp, $uploaded_image);
        $pd = new product();
        $tensp = $_POST['tensp'];
        $loai = $_POST['loaisp'];
        $tacgia = $_POST['tacgia'];
        $hinh = $unique_image;
        $gia = $_POST['gia'];
        $soluong = $_POST['soluong'];
        $nxb = $_POST['nxb'];
        $mota = $_POST['mota'];
        $giamgia = $_POST['giamgia'];
        $trangthai = '0';
        session_start();
        // ma phieu nhap dang lưu tren session
        $id_pn = $_SESSION['mapn'];
        // insert vào bảng sản phẩm
        $insert_sp = $pd->insert_sanpham($tensp, $loai, $tacgia, $hinh, $gia, $soluong, $nxb, $mota, $giamgia, $trangthai);
        $new = $pd->show_idmoi();
        $tv = $new->fetch_assoc();
        $id_sp = $tv['MaSP'];
        $pn = new phieunhap();
        //// gọi hàm insert ct phieu nhap
        $insert_ctpn = $pn->insert_ctphieu($id_pn, $id_sp, $soluong,$gia);
        $_spnhap= array(array('hinh'=>$hinh,'tensp'=>$tensp,'soluong'=>$soluong,'gia'=>$gia));
        if(isset($_SESSION['phieunhap'])){
            foreach ($_SESSION['phieunhap'] as $cart_itm) {
                $_spham[] = array('hinh'=> $cart_itm['hinh'] ,'tensp'=> $cart_itm['tensp'],'soluong'=>$cart_itm['soluong'],'gia'=>$cart_itm['gia']);
        }
        $_SESSION['phieunhap'] = array_merge($_spham,$_spnhap);
        }
        else{
            $_SESSION['phieunhap']= $_spnhap;
        }
        header('location:../in_kho.php?cvk=14');
    } else {
        echo'<script>alert("Có Lõi Xãy ra")</script>';
    }
}
//// update sản phẩm
else if (isset($_POST['change-stt1'])) {
    $id = $_POST['change-stt1'];
    $data = '0';
    $pd = new product();
    $update = $pd->update_stt($id, $data);

    header('location:../in_kho.php?cvk=11');
} else if (isset($_POST['change-stt2'])) {
    $id = $_POST['change-stt2'];
    $data = '1';
    $pd = new product();
    $update = $pd->update_stt($id, $data);

    header('location:../in_kho.php?cvk=11');
} else if (isset($_POST['oke'])) {
    $id = $_POST['id'];
    $pd = new product();
    $result = $pd->getproductby_Id($id);
    $tv = $result->fetch_assoc();
    if ($_POST['soluong'] == NULL) {
        $_POST['soluong'] = $tv['SoluongCon'];
    } else {
        $_POST['soluong'];
    }
    if ($_POST['gia'] == NULL) {
        $_POST['gia'] = $tv['DonGia'];
    } else {
        $_POST['gia'];
    }
    if ($_POST['giamgia'] == NULL) {
        $_POST['giamgia'] = $tv['GiamGia'];
    } else {
        $_POST['giamgia'];
    }
    $giamoi = $_POST['gia'];
    $slgmoi = $_POST['soluong'];
    $giamgia = $_POST['giamgia'];
    $updatenew = $pd->update_gia($id, $giamoi);
    $updatenew1 = $pd->update_giamgia($id, $giamgia);
    $updatenew2 = $pd->update_slg_sp($id, $slgmoi);
    header('location:../in_kho.php?cvk=11');
}
?>

