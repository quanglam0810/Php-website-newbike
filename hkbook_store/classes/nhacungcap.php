<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/database.php');
include_once ($filepath . '/../helpers/format.php');

/**
 * 
 */
class nhacungcap {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_nhacc()
    {
        $query = "SELECT * FROM nhacc order by MaNCC desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_nhacc_id($id)
    {
        $query = "SELECT TenNCC FROM nhacc where MaNCC='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_ncc($id) {
        $query = "DELETE FROM nhacc where MaNCC = '$id' ";
        $result = $this->db->delete($query);
    }
    public function them_nhacc($id,$name,$sdt,$diachi,$mail) {
        $query = "insert into nhacc(MaNCC,TenNCC,SDT,DiaChi,Email) values('$id','$name','$sdt','$diachi','$mail')";
        $result = $this->db->insert($query);
        return $result;
    }
}

?>