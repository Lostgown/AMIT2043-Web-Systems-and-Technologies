<?php   
        //data check
        if (!isset($_POST['name'])) {
                echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'><div></div>
                <script> alert('Please Login.'); window.location.href='../index.php' </script>";
        }

        session_start();
        include('connection.php');    

        if ($_POST['regType'] == 'admin')   {
                $sql = "SELECT admin_id FROM admin ORDER BY admin_id DESC LIMIT 1";
                $result= $con->query($sql);  
                $row = mysqli_fetch_assoc($result); 
                $number = ltrim($row['admin_id'],'A')+1;  
                $id = 'A' . $number;           
        } 
        else {                                                                                        
                $sql = "SELECT member_id FROM member ORDER BY member_id DESC LIMIT 1";
                $result= $con->query($sql);  
                $row = mysqli_fetch_assoc($result); 
                if (isset($row['member_id'])) {
                        $number = ltrim($row['member_id'],'M')+1;  
                        $id = 'M' . $number;   
                }
                else {
                        $id = "M1";
                }
                
        }

        $name = $_POST['name'];  
        $password = $_POST['pass'];  
        $phone = $_POST['phone_no'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];

        if ($_POST['regType'] == 'admin') {
                $sql ="INSERT INTO `admin` 
                (`admin_id`, `admin_name`, `admin_pass`, `phone_no`, `gender`,'email') 
                VALUES('$id', '$name', '$password', '$phone', '$gender',$email)";
                $con->query($sql); 

                echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'><div></div>
                        <script>
                                alert('Successful Signed Up Admin. The Admin ID is $id');
                                window.location.href = '../Admin/signupAdmin.php';
                        </script>";
        }
        
        else {
                $sql ="INSERT INTO `member` 
                (`member_id`, `member_name`, `member_pass`, `phone_no`, `gender`,'email') 
                VALUES('$id', '$name', '$password', '$phone', '$gender',$email)";
                $con->query($sql);

                if (isset($_SESSION['userType'])) {
                        echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/index.css'>
                                <div></div>
                                <script>
                                        alert('Successful Signed Up Member. The Member ID is $id');
                                        window.location.href = '../Admin/signupAdmin.php';
                                </script>";
                }
                else {
                        echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/index.css'>
                                <div></div>
                                <script>
                                        alert('Successful Signed Up. Your ID is $id');
                                        window.location.href = '../index.php';
                                </script>";
                }
        }
?>
