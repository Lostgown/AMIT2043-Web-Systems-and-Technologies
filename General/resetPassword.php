<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '../css/formUpdate.css'>
</head>
<script>
    function noti(){
        alert('Password had been reset.Login Again.');
        window.location.href = "../index.php";
    }

</script>
<body class="bg-dark">
<div class = 'fixed'>     
        <div class = 'content'>
            <div>
            <div class = "frm" style="text-align:left;">  
            <h1 style="text-align:center"> Reset Password </h1>
                <form name = 'f1' action = '../index.php' onsubmit = 'return validation()' method = 'POST' autocomplete='off'>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "text" name  = "id" placeholder= " "/>
                            <span class="input_label">User ID</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name  = "pass" placeholder= " "/>
                            <span class="input_label">New Password</span>
                        </label>
                    </div>

                    <div class = 'input_box'>
                        <label class="input">
                            <input class = "input_field" type = "password" name  = "passNew" placeholder= " "/>
                            <span class="input_label">New Password Confirmation</span>
                        </label>
                    </div>
                    <br>
                    
                    <button id="btnUpdate" name ='btn' onclick="noti()"> Reset </button>
                    

                </form>
                    <a href='javascript: history.go(-1)'><button id="btnUpdate" name ='btn'> Back </button></a>
                    <br>

                <?php $con=null; ?>
            </div>
        </div>
    </div>
</div>

</body>

</html>