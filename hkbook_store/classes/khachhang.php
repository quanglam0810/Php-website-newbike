<header>
 <link rel='stylesheet' href='../sweet/css.css'>
 <script src='../sweet/js.js'></script>
</header>
<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/database.php');
include_once ($filepath . '/../helpers/format.php');

/**
 * 
 */
class khachhang {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function comment($id_sp,$id_kh,$tieude,$noidung,$time,$trangthai){
        $query = "insert into comment(MaSP,MaKH,NoiDung,ThoiGian,TrangThai) values('$id_sp','$id_kh','$noidung','$time','$trangthai')";
        $result = $this->db->insert($query);
        return $result;  
    }
    public function showbinhluan($id)
    {
        $query = "SELECT * FROM comment WHERE TrangThai='0' and MaSP ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function showbinhluanall()
    {
        $query = "SELECT * FROM comment order by MaBL desc";
        $result = $this->db->select($query);
        return $result;
    } 
     public function update_stt_rm($id)
    {
        $query = "update comment set TrangThai='1' where MaBL ='$id'";
        $result = $this->db->update($query); 
        return $result;
    } 
    public function update_stt_ac($id)
    {
        $query = "update comment set TrangThai='0' where MaBL ='$id'";
        $result = $this->db->update($query);  
        return $result;
    }
    public function showtenkh($id)
    {
        $query = "SELECT HoTen FROM KhachHang where MaKH ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function showinfokh($id)
    {
        $query = "SELECT * FROM KhachHang where MaKH ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function checktk($data)
    {
        $query = "SELECT MaKH FROM KhachHang where TaiKhoan ='$data'";
        $result = $this->db->select($query);
        return $result;
    }
    public function checkmail($data)
    {
        $query = "SELECT MaKH FROM KhachHang where Email ='$data'";
        $result = $this->db->select($query);
        return $result;
    }
    public function checksdt($data)
    {
        $query = "SELECT MaKH FROM KhachHang where SDT ='$data'";
        $result = $this->db->select($query);
        return $result;
    }  
}
?>