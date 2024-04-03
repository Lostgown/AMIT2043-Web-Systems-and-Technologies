<?php   
    //data check
    if (!isset($_POST['user'])) {
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../Bling/main.css'><div></div>
        <script> alert('Please Login.'); window.location.href='../index.php' </script>";
    }

    include('connection.php');  
    $id = $_POST['user'];  
    $password = $_POST['pass'];  
    $loginType = $_POST['loginType']; 

    //to prevent from mysqli injection  
    $id = stripcslashes($id);  
    $password = stripcslashes($password);  
    $id = mysqli_real_escape_string($con, $id);  
    $password = mysqli_real_escape_string($con, $password); 
    
    if ($loginType == 'member') {
        $sql = "select *from member where member_id = '$id' and member_pass = '$password'";  
    }
    if ($loginType == 'admin') {
        $sql = "select *from admin where admin_id = '$id' and admin_pass = '$password'";  
    }
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result); 

    if($count == 1){  
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/index.css'><div></div>
                <script> alert('Login Successful.') </script>";

        session_start();
        $_SESSION['idUser'] = $id;
        $_SESSION['userType'] = $loginType;

        if ($loginType == 'member') {
            echo "<script>window.location.href = '../Member/menuMember.php'</script>";
        }
        else if ($loginType == 'admin') {
            echo "<script>window.location.href = '../Admin/menuAdmin.php'</script>";
        }
    }  
    else{  
        echo "<link rel = 'stylesheet' type = 'text/css' href = '../css/index.css'>
                <div></div>
                <script>
                alert('Login fail. Wrong User ID or password.')
                window.location.href = '../index.php'
                </script>";
        
    }
    ?>  
