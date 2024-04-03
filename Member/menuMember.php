<?php
    session_start();
    include('../Sys/authCheck.php');
    validMember();
    include ('../Sys/connection.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Menu</title>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/menuMember.css'>
<head>
    
<header class = "heading" style="display:block;">
            <?php include('../lib/navbar.php'); ?>
</header>

<body>
        

        <main>
            <div class = "content">

                <div style="display:inline-block;">
                    <h1 style="color:#555555;margin-top:30px;font-weight: 400px;
                    font-size: 30px;text-decoration: none;text-align: center;">MEMBER MENU<h1>
                </div>

                <div class="box-container">
                    <div class="box-profile">
                        <h3>Profile</h3>
                        <p><b>ID:</b><?php echo $_SESSION['idUser']?>
                        <br>
                        <b>Name:</b>
                        <?php
                            $sql = "SELECT member_name FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['member_name'];
                        ?>
                        <br>
                        <b>Phone No:</b>
                        <?php
                            $sql = "SELECT phone_no FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['phone_no'];
                        ?>
                        <br>
                        <b>Gender:</b>
                        <?php
                            $sql = "SELECT gender FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['gender'];
                            
                        ?>
                        <br>
                        <b>Email:</b>
                        <?php
                            $sql = "SELECT email FROM member WHERE member_id = '$_SESSION[idUser]'";

                            $result= $con->query($sql);  
                            $row = mysqli_fetch_assoc($result);
                                echo $row['email'];
                        ?>
                        <a href="../General/updateMember.php" class="btn">Edit</a>
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