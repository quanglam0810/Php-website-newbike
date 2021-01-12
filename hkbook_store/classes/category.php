<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/database.php');
include_once ($filepath . '/../helpers/format.php');
?>
<?php

/**
 * 
 */
class category {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_category($id,$ten) {       
            $query = "INSERT INTO loaisp (MaLoai,TenLoai) VALUES('$id','$ten')";
            $result = $this->db->insert($query);           
    }
    public function show_category() {
        $query = "SELECT * FROM loaisp order by MaLoai desc ";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_category($id) {
        $query = "DELETE FROM loaisp where MaLoai = '$id' ";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Category Deleted Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='success'>Category Deleted Not Success</span>";
            return $alert;
        }
    }

    public function getcatbyId($id_cat) {
        $query = "SELECT * FROM loaisp where MaLoai = '$id_cat' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_category_fontend() {
        $query = "SELECT * FROM loaisp order by MaLoai desc ";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_by_cat($id_cat) {
        $query = "SELECT * FROM sanpham where MaLoai = '$id_cat' order by MaLoai desc LIMIT 8";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_name_by_cat($id_cat) {
        $query = "SELECT sanpham.*,loaisp.TenLoai,loaisp.MaLoai 
					  FROM sanpham,loaisp 
					  WHERE sanpham.MaLoai = loaisp.MaLoai
					  AND sanpham.MaLoai ='$id_cat' LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }

}
?>

