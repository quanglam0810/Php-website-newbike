<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/../lib/database.php');
include_once ($filepath . '/../helpers/format.php');
?>
<?php

/**
 * 
 */
class giohang {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_cart_emty($tensp,$hinh,$masp,$soluong,$giaban)
    {             
        $new_pro = array(array('name' =>$tensp,'image' =>$hinh ,'id' => $masp , 'qty' =>$soluong , 'price' => $giaban));
        $_SESSION['product']= $new_pro;        
    }
    public function add_cart($tensp,$hinh,$masp,$soluong,$giaban,$product)
    {          
        $new_pro = array(array('name' =>$tensp,'image' =>$hinh ,'id' => $masp , 'qty' =>$soluong , 'price' => $giaban));                              
        $_SESSION['product']= array_merge($product,$new_pro);              
    } 
    public function update_slg_item($masp,$soluong)
    {
        session_start();      
        $new_pro = array(array('name' =>$tensp,'image' =>$hinh ,'id' => $masp , 'qty' =>$soluong , 'price' => $giaban));
        $_SESSION['product']= $new_pro;
    }
    public function delete_item($masp)
    {
        session_start();      
        $new_pro = array(array('name' =>$tensp,'image' =>$hinh ,'id' => $masp , 'qty' =>$soluong , 'price' => $giaban));
        $_SESSION['product']= $new_pro;
    } 
}
?>