<?php 
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        die( header( 'location: logout.php' ) );
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['idUser'])) {
        function validMember() {
            if ($_SESSION['userType'] != 'member') {
                header("location:../Admin/menuAdmin.php");
            }
        } 

        function validAdmin() {  
            if ($_SESSION['userType'] != 'admin') {
                header("location:../Member/menuMember.php");
            }
        }  

        function validnotMember() {
            if ($_SESSION['userType'] == 'member') {
                header("location:../Member/menuMember.php");
            }
        } 
    }
    else {
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'><div></div>
            <script> alert('Please Login.'); window.location.href='../index.php' </script>";
    }
?>