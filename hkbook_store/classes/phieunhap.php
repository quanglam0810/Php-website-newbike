<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/database.php');
include_once ($filepath . '/../helpers/format.php');

/**
 * 
 */
class phieunhap {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_phieu()
    {
        $query = "SELECT * FROM phieunhap order by MaPN desc ";
        $result = $this->db->select($query);
        return $result;
    }
     public function show_phieu_id($id)
    {
        $query = "SELECT MaPN FROM phieunhap where MaPN='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_phieu($id) {
        $query = "DELETE FROM phieunhap where MaPN = '$id' ";
        $result = $this->db->delete($query);
    }
    public function them_phieu($id,$id_nv,$id_ncc,$date) {
        $query = "insert into phieunhap(MaPN,MaNV,MaNCC,NgayLap) values('$id','$id_nv','$id_ncc','$date')";
        $result = $this->db->insert($query);
        return $result;
    }
    public function insert_ctphieu($id_pn,$id_sp,$soluong,$dongia) {
        $query = "insert into ctphieunhap(MaPN,MaSP,SoLuongNhap,DonGiaNhap) values('$id_pn','$id_sp','$soluong','$dongia')";
        $result = $this->db->insert($query);
        return $result;
    }
    public function show_ctphieu_id($id)
    {
        $query = "SELECT * FROM ctphieunhap where MaPN='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    
}

?>