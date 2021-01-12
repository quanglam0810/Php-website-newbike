<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/database.php');
include_once ($filepath . '/../helpers/format.php');

/**
 * 
 */
class nhanvien {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function show_nhanvien() {
        $query = "SELECT * FROM nhanvien where MaQuyen !='1' order by MaNV desc ";
        $result = $this->db->select($query);
        return $result;
    }
     public function show_nhanvien_id($id) {
        $query = "SELECT TenNV FROM nhanvien where MaNV='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function them_nhanvien($id,$name,$tk,$mk,$quyen,$trangthai) {
        $query = "insert into nhanvien(MaNV,TenNV,TaiKhoan,MatKhau,MaQuyen,TrangThai) values('$id','$name','$tk','$mk','$quyen','$trangthai')";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_q($id,$data)
    {
        $query ="update nhanvien set MaQuyen='$data' where MaNV='$id'";
        $result = $this->db->update($query);
    }
    public function update_stt($id,$data)
    {
        $query ="update nhanvien set TrangThai ='$data' where MaNV='$id'";
        $result = $this->db->update($query);
    }
    public function checktk($data)
    {
        $query = "SELECT MaNV FROM nhanvien where TaiKhoan ='$data'";
        $result = $this->db->select($query);
        return $result;
    }
    public function checkma($data)
    {
        $query = "SELECT TenNV FROM nhanvien where MaNV ='$data'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>