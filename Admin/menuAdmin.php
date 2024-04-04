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
    <!-- <link rel = 'stylesheet' type = 'text/css' href = '../css/popupBox.css'> -->
    <style>
    .modal {
    /* background-color: aquamarine; */
    position: fixed;
    inset: 0;
    display: none;
    align-items: center;
    justify-content: center;
    /* border-radius: ; */
}

.contentA {
    position: absolute;
    background-color: #ffe2b9;
    padding: 2rem;
    border-radius: 4px;
    width: 25rem;
    height: 23rem;
}

.modal:target {
    display: flex;
}

/* div>form>a {
    position: absolute;
    top: 10px;
    right: 10px;
    color: coral;
    font-size: 30px;
    text-decoration: none;
} */
</style>
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
                            <!-- <a href="#popup-box">Click to Open Popup Box!</a> -->
                        </form>
                    </div>
                    
                </div>
                </p>
            </div>
    </main>

    <div id="popup-box" class="modal" style="z-index: 10;">
        <div class="contentA">
            <form action="">
                <h1>
                    Sign Up
                </h1>

                <legend>Username:</legend>
                <input type="text" id="username" name="username"><br><br>

                <legend>Email:</legend>
                <input type="email" id="email" name="email"><br><br>

                <legend>Password:</legend>
                <input type="password" id="password" name="password"><br><br>


                <legend>Gender:</legend>
                <input type="radio" name="gender" id="male">
                <label for="male">M</label>

                <input type="radio" name="gender" id="female">
                <label for="female">F</label>
                >
                <label for="others">Others</label>
                <input type="text" id="username" name="username" size="4"><br><br>


                <input type="reset" value="Reset">
                <input type="submit" value="Submit">



                <a href="#" style="
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    color:coral;
                    font-size: 30px;
                    text-decoration: none;
                ">&times;</a>
            </form>
        </div>
    </div>
</body>
<footer>
    <?php include('../lib/footer.php'); ?>
</footer>
</html>