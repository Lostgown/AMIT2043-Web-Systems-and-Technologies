<?php    
        //data check
        if (!isset($_POST['id'])) {
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'><div></div>
                <script> alert('Please Login.'); window.location.href='../index.php' </script>";
        }

        session_start();
        include('connection.php');

        $id = $_POST['id'];


        $userType = substr_replace($id, '', 1, 1);

        if ($_POST['name'] != "") {
                $name = $_POST['name'];  
                $sql = updateName($userType, $id, $name);
                $con->query($sql);
        }
        if ($_POST['phone_no'] != "") {
                $phone = $_POST['phone_no'];
                $sql = updatePhone($userType, $id, $phone);
                $con->query($sql);
        }
        if ($_POST['email'] != "") {
                $email = $_POST['email'];
                $sql = updateEmail($userType, $id, $email);
                $con->query($sql);
        }
        if ( isset($_POST['gender']) && $_POST['gender'] != "") {
                $gender = $_POST['gender'];
                $sql = updateGender($userType, $id, $gender);
                $con->query($sql);
        }
        

        if ($_SESSION['userType'] == 'admin' && $userType != 'A') {
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'><div></div>
                        <script>
                                alert('Member profile successfully update')
                                window.location.href = '../Admin/memberList.php'
                        </script>";
        }
        else {
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'><div></div>
                        <script>
                                alert('Your profile successfully update')
                                window.location.href = '../Admin/menuAdmin.php'
                        </script>";
        }
?>

<?php
        function updateName($type, $x, $name) {
                if ($type == 'M') {
                        $query = "UPDATE `member` SET member_name = '$name' WHERE `member`.`member_id` = '$x'";
                }
                else if ($type == 'A') {
                        $query = "UPDATE `admin` SET admin_name = '$name' WHERE `admin`.`admin_id` = '$x'";
                }
                return $query;
        }

        function updatePhone($type, $x, $phone) {
                if ($type == 'M') {
                        $query = "UPDATE `member` SET phone_no = '$phone' WHERE `member`.`member_id` = '$x'";
                }
                else if ($type == 'A') {
                        $query = "UPDATE `admin` SET phone_no = '$phone' WHERE `admin`.`admin_id` = '$x'";
                }
                return $query;
        }

        function updateEmail($type, $x, $email) {
                if ($type == 'M') {
                        $query = "UPDATE `member` SET email = '$email' WHERE `member`.`member_id` = '$x'";
                }
                else if ($type == 'A') {
                        $query = "UPDATE `admin` SET email = '$email' WHERE `admin`.`admin_id` = '$x'";
                }
                return $query;
        }

        function updateGender($type, $x, $gender) {
                if ($type == 'P') {
                        $query = "UPDATE `member` SET gender = '$gender' WHERE `member`.`member_id` = '$x'";
                }
                else if ($type == 'A') {
                        $query = "UPDATE `admin` SET gender = '$gender' WHERE `admin`.`admin_id` = '$x'";
                }
                return $query;
        }

        
?>