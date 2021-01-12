<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/database.php');
include_once ($filepath . '/../helpers/format.php');
?>
<?php

/**
 * 
 */
class donhang {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function dh_chuaxuli() {
        $query = "SELECT * FROM donhang WHERE TrangThai='đang xử lí' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function dh_bihuy() {
        $query = "SELECT * FROM donhang WHERE TrangThai='đã hủy đơn' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function dh_tiepnhan() {
        $query = "SELECT * FROM donhang WHERE TrangThai='đã tiếp nhận' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function dh_tc() {
        $query = "SELECT * FROM donhang WHERE TrangThai='giao thành công' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function xuathang() {
        $query = "SELECT * FROM donhang WHERE TrangThai='giao thành công' or TrangThai= 'đang giao hàng' or TrangThai='giao thất bại' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function dh_tb() {
        $query = "SELECT * FROM donhang WHERE TrangThai='giao thất bại' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function dh_danggiao() {
        $query = "SELECT * FROM donhang WHERE TrangThai='đang giao hàng' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function info_dh($id) {
        $query = "SELECT * FROM donhang WHERE MaDH='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update($id, $data) {
        $query = "UPDATE donhang SET TrangThai = '$data' WHERE MaDH = '$id' ";
        $result = $this->db->update($query);
    }
     public function update_date($id,$data) {
        $query = "UPDATE donhang SET NgayGiao = '$data' WHERE MaDH = '$id' ";
        $result = $this->db->update($query);
    }

    public function update_nvk($id, $datanv) {
        $query = "UPDATE donhang SET MaNV = '$datanv' WHERE MaDH = '$id' ";
        $result = $this->db->update($query);
    }

    public function show_ctdh($id) {
        $query = "SELECT * FROM ctdonhang WHERE MaDH = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function dem_slg($id) {
        $query = "SELECT SoLuong,DonGia FROM ctdonhang WHERE MaDH = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function dh_tc_date($date) {        
        $query = "SELECT * FROM donhang WHERE TrangThai='giao thành công'and NgayGiao >= '$date' ";
        $result = $this->db->select($query);
        return $result;
    }
     public function dh_tc_date_ct($date) {        
        $query = "SELECT ctdonhang.MaSP,ctdonhang.SoLuong,ctdonhang.DonGia FROM ctdonhang,donhang where donhang.TrangThai ='giao thành công' and ctdonhang.MaDH= donhang.MaDH and donhang.NgayGiao >= '$date' group by ctdonhang.MaSP";
        $result = $this->db->select($query);
        return $result;
    }

}

?>
                