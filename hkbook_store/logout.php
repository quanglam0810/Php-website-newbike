<?php      
            session_start();
            if (isset($_GET[tt]) && $_GET['tt'] == 'dangxuat') {
                unset($_SESSION['dangnhap']);
                unset($_SESSION['makh']);
                header('location:index.php');
            } else {
               
            }
            ?>