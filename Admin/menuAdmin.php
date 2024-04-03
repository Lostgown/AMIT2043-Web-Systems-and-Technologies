<?php
    session_start();
    include('../Sys/authCheck.php');
    validAdmin();
    include('../Sys/connection.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Menu</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/menuAdmin.css'>
<head>
<body>
        <header class = "heading" style="display:block;">
            <?php include('../lib/navbar.php'); ?>
        </header>

        <main>
            <div class = "content">

                <div style="display:inline-block;">
                    <h1 style="color:#555555;margin-top:30px;font-weight: 400px;
                    font-size: 30px;text-decoration: none;text-align: center;">ADMIN MENU<h1>
                </div>

                <div class="box-container">

                    <div class="box-profile">
                        <h3>Profile</h3>
                        <p><b>ID:</b><?php echo $_SESSION['idUser']?>
                        <br>
                        <b>Name:</b>
                        <?php
                            $sql = "SELECT admin_name FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['admin_name'];
                        ?>
                        <br>
                        <b>Phone No:</b>
                        <?php
                            $sql = "SELECT phone_no FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['phone_no'];
                        ?>
                        <br>
                        <b>Gender:</b>
                        <?php
                            $sql = "SELECT gender FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['gender'];
                        ?>
                        <br>
                        <b>Email:</b>
                        <?php
                            $sql = "SELECT email FROM admin WHERE admin_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['email'];
                        ?>
                        <form action = '../General/updateProfile.php' method = 'POST'>
                            <?php echo "<style>button {float:right;margin-top: 10px;margin-right: 10px;display: block;background: orange;color: #fff;font-size: 17px;border-radius: 30px;border:none;padding: 8px 25px;text-decoration: none;}button:hover{background: rgb(255, 186, 58);transition: all 0.3s ease 0s;}</style>
                            <button id = 'btnchng' name = 'id' value = '$_SESSION[idUser]'> Update </button></a>"; ?>
                        </form>
                    </div>
                    
                </div>
                </p>


            </div>
    </main>
</body>
<footer>
    <?php include('../lib/footer.php'); ?>
</footer>
</html>