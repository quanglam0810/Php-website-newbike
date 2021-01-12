<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/database.php');
include_once ($filepath . '/../helpers/format.php');

/**
 * 
 */
class author {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_author($tentg,$info) {       
            $query = "INSERT INTO tacgia(TenTG,ThongTin) VALUES('$tentg','$info') ";
            $result = $this->db->insert($query);
          
        }
    public function show_author() {
        $query = "SELECT * FROM tacgia order by MaTG desc ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getauthorbyId($id) {
        $query = "SELECT * FROM tacgia where MaTG = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_author($tentg,$id) {
        $tentg = $this->fm->validation($tentg); //gọi ham validation từ file Format để ktra
        $tentg = mysqli_real_escape_string($this->db->link, $tentg);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($tentg)) {
            $alert = "<span class='error'>Tên tác giả không được để trống</span>";
            return $alert;
        } else {
            $query = "UPDATE tacgia SET TenTG = '$tentg' WHERE MaTG = '$id' ";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Update Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Update  NOT Success</span>";
                return $alert;
            }
        }
    }

    public function del_author($id) {
        $query = "DELETE FROM tacgia where MaTG = '$id' ";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Deleted Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='success'>Deleted Not Success</span>";
            return $alert;
        }
    }

}

?>