<?php include '../../classes/product.php';  ?>
<?php include '../../classes/donhang.php';  ?>
<?php require_once '../../helpers/format.php';
?>
<?php       
$donhang = new donhang();
$fm = new Format();
$product = new product();
?>
<?php
session_start();
    if(isset($_POST['oke']))
    {
        $id = $_POST['oke'];
        $data='đã tiếp nhận';
        $update = $donhang -> update($id,$data);
        header('location:../in_nv.php?cv=1');
    }
    else
    if(isset($_POST['ko-ok']))
    {
        $id=$_POST['ko-ok'];    
        $data='đã hủy đơn';
        $update = $donhang -> update($id,$data);
        $showct = $donhang->show_ctdh($id);
        while ($result1 = $showct->fetch_assoc()) {
            $sltra=$result1['SoLuong'];
            $sptra = $result1['MaSP'];
            $spkho = $product->getproductbyId($sptra);  
            $slgkho = $spkho->fetch_assoc();
            $slgcon = $slgkho['SoluongCon'];
            $tonghoan = $slgcon+$sltra;                       
            $slgtra1 = $product->update_slg_sp($sptra,$tonghoan);
        }
         header('location:../in_nv.php?cv=2');  
        }         
    else
    if(isset($_POST['vc']))
    {
        $id=$_POST['vc'];    
        $data ='đang giao hàng';
        $datanv = $_SESSION['ma_nv'];       
        $update = $donhang -> update($id,$data);
        $update2 = $donhang -> update_nvk($id,$datanv);
        header('location:../in_kho.php?cvk=1');
    }
      else
    if(isset($_POST['tc']))
    {
        $id=$_POST['tc'];    
        $data='giao thành công';
        $update = $donhang -> update($id,$data);
        $date= date('Y-m-d');
        $update_date=$donhang->update_date($id,$date);
        header('location:../in_kho.php?cvk=2');
    }
      else
    if(isset($_POST['tb']))
    {
        $id=$_POST['tb'];    
        $data='giao thất bại';
        $update = $donhang -> update($id,$data);
        $date= date('Y-m-d');
        $update_date=$donhang->update_date($id,$date);
        $showct = $donhang->show_ctdh($id);
        while ($result1 = $showct->fetch_assoc()) {
            $sltra=$result1['SoLuong'];
            $sptra = $result1['MaSP'];
            $spkho = $product->getproductbyId($sptra);  
            $slgkho = $spkho->fetch_assoc();
            $slgcon = $slgkho['SoluongCon'];
            $tonghoan = $slgcon+$sltra;                       
            $slgtra1 = $product->update_slg_sp($sptra,$tonghoan);
        }
        header('location:../in_kho.php?cvk=2');
    }
?>