<?php

$filepath = realpath(dirname(__FILE__));
session_start();
//include ($filepath . '/../lib/session.php');
//Session::checkLogin(); // gọi hàm check login để ktra session
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php

class adminlogin {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function login_admin($adminUser, $adminPass) {
        $adminUser = $this->fm->validation($adminUser); //gọi ham validation từ file Format để ktra
        $adminPass = $this->fm->validation($adminPass);
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass); //mysqli gọi 2 biến. (adminUser and link) biến link -> gọi conect db từ file db

        if (empty($adminUser) || empty($adminPass)) {
            $alert = "User and Pass không nhập rỗng";
            return $alert;
        } else {
            $query = "SELECT * FROM NhanVien WHERE TaiKhoan = '$adminUser' AND MatKhau = '$adminPass' AND TrangThai='1' LIMIT 1 ";
            $result = $this->db->select($query);                     
            if ($result != false) {                                        
                $value = $result->fetch_assoc();
                $_SESSION['name_nv'] = $value['TenNV'];
                $_SESSION['ma_nv']= $value['MaNV'];
                $_SESSION['ma_quyen']= $value['MaQuyen'];
                $quyen = $_SESSION['ma_quyen'];
                $query1 = "SELECT * FROM quyen WHERE MaQuyen = $quyen  LIMIT 1 ";
                $result1 = $this->db->select($query1);
                $value1 = $result1->fetch_assoc();
                $quyennv = $value1['TenQuyen'];
                $_SESSION['tenquyen'] =$quyennv;
                //Session::set('adminlogin', true); 
                if($quyen==1)
                {
                    header("Location:in_admin.php");
                }
                if($quyen==2)
                {
                    header("Location:in_nv.php");
                }
                 if($quyen==3)
                {
                    header("Location:in_kho.php");
                }
                
            } else {
                $alert = "*Tài khoản hoặc mật khẩu không đúng";
                return $alert;
            }
        }
    }

}

?>