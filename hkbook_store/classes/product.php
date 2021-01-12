<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/database.php');
include_once ($filepath . '/../helpers/format.php');
?>

<?php

/**
 * 
 */
class product {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_sanpham($tensp,$loai,$tacgia,$hinh,$gia,$soluong,$nxb,$mota,$giamgia,$trangthai){          
            $query = "INSERT INTO sanpham(TenSP,MaLoai,MaTG,Hinh,DonGia,SoluongCon,NXB,MoTa,GiamGia,TrangThai) VALUES('$tensp','$loai','$tacgia','$hinh','$gia','$soluong','$nxb','$mota','$giamgia','$trangthai') ";
            $result = $this->db->insert($query);            
        }    
    public function show_product() {
        $query = "SELECT *FROM sanpham order by MaSP desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_product_id($id) {
        $query = "SELECT TenSP FROM sanpham where MaSP='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
     public function show_product_slg() {
        $query = "SELECT * FROM sanpham where SoluongCon=0";
        $result = $this->db->select($query);
        return $result;
    }
     public function show_idmoi() {
        $query = "SELECT MaSP FROM sanpham order by MaSP desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;         
     }
     /// cap nhat soluong san pham
    public function update_slg_sp($id, $data) {
        $query = "UPDATE sanpham SET SoluongCon = '$data' WHERE MaSP= '$id'";
        $result = $this->db->update($query);
    }
    ///cap nhat trang thai san pham
    public function update_stt($id,$data) {
        $query = "update sanpham set TrangThai='$data' where MaSP = '$id' ";      
        $result = $this->db->update($query);
    }
    ///cap nhat gia san pham
    public function update_gia($id,$data) {
        $query = "update sanpham set DonGia='$data' where MaSP = '$id' ";      
        $result = $this->db->update($query);
    }
    ///cap nhat khuyen mai san pham
    public function update_giamgia($id,$data) {
        $query = "update sanpham set GiamGia='$data' where MaSP = '$id' ";      
        $result = $this->db->update($query);
    }
    public function getproductbyId($id) {
        $query = "SELECT SoluongCon FROM sanpham where MaSP = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
     public function getproductby_Id($id) {
        $query = "SELECT * FROM sanpham where MaSP = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    //Kết thúc Backend

    public function getproduct_tv() {
        $query = "SELECT * FROM sanpham where  MaLoai = 'VHVN01'and TrangThai='0' order by MaSP desc LIMIT 4 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_nt() {
        $query = "SELECT * FROM sanpham where  MaLoai = 'NT01' and TrangThai='0' order by MaSP desc LIMIT 4 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_kt() {
        $query = "SELECT * FROM sanpham where  MaLoai = 'PT01' and TrangThai='0' order by MaSP";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_sale() {
        $query = "SELECT * FROM SanPham where GiamGia !='NULL'and TrangThai='0' order by MaSP desc LIMIT 4 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_new() {
        $query = "SELECT * FROM SanPham where GiamGia ='0'and TrangThai='0' order by MaSP desc LIMIT 4 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_details($idsp) {
        $query = "SELECT * FROM sanpham WHERE MaSP = '$idsp'and TrangThai='0'";
        $result = $this->db->select($query);
        return $result;
    }

}
