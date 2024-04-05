<!DOCTYPE html>
<html>  
<head>  
    <title>Sign Up Member Page</title>   
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "css/signup-member.css">  
    <link rel = 'stylesheet' type = 'text/css' href = '../css/main.css'> 

    <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>

</head>  
<body>  
    <div class = "frm">  

        <h1 style="text-align:center;"> Sign Up </h1>

        <form name = "f1" action = "Sys/signup.php" onsubmit = "return validation()" method = "POST" autocomplete="off"> 

            <div class = 'input_box'>
                <label class="input">
                    <input class = "input_field" type = "text" id ="name" name  = "name" 
                    autofocus="autofocus" placeholder= " " required
                    oninvalid="this.setCustomValidity('Fill in your name.')"
                    oninput="this.setCustomValidity('')" />   
                    <span class="input_label">Full Name</span>
                </label>
            </div>

            <div class = 'input_box'>
                <label class="input">
                    <input class = "input_field" type = "password" name  = "pass" 
                        placeholder= " " required
                        oninvalid="this.setCustomValidity('Fill in your password again.')"
                        oninput="this.setCustomValidity('')" />  
                    <span class="input_label">Password</span>
                </label>
            </div>

            <div class = 'input_box'>
                <label class="input">
                    <input class = "input_field" type = "password" name  = "passcfm" placeholder= " " required
                        oninvalid="this.setCustomValidity('Fill in your password again.')"
                        oninput="this.setCustomValidity('')" />
                    <span class="input_label">Password Confirmation</span>
                </label>
            </div>


            <div class = 'input_box'>
                <label class="input">
                    <input class = "input_field" type = "text" id ="phone_no" name  = "phone_no" placeholder= " " required
                        oninvalid="this.setCustomValidity('Fill in your phone number.')"
                        oninput="this.setCustomValidity('')" />  
                    <span class="input_label">Phone Number</span>
                </label>
            </div>
            
            <div class = 'input_box'>
                <label class="input">
                    <input class = "input_field" type = "text" id ="email" name  = "email" placeholder= " " required
                        oninvalid="this.setCustomValidity('Fill in your email.')"
                        oninput="this.setCustomValidity('')" />  
                    <span class="input_label">Email</span>
                </label>
            </div>

            <div class = "genderRadio">
                <p id = "gender" style="text-align: left;"> &nbspGender: &nbsp &nbsp </p>      
                <p id = "btnMale"><label>
                    <input type = "radio" name = "gender" value = 'Male' required = "required"
                    oninvalid="this.setCustomValidity('Choose your gender.')"
                    oninput="this.setCustomValidity('')" /> Male &nbsp </label>
                </p>
                <p id = "btnFemale"><label><input type = "radio" name = "gender" value = 'Female' required = "required"/> Female </p></label>
                <br>
            </div>
           
            <button id = "btnSignUp" name = 'regType' value = "member" > Sign Up </button> 

        </form>
        
        <a href='index.php'><button id = 'btncancel' name ='btn'> Back </button></a>

        <?php $con=null; ?>

    </div>  

    <script>  
        function validation() {  
            var ps=document.f1.pass.value;  
            var pscfm=document.f1.passcfm.value; 
            
            if(ps != pscfm) {  
                alert("Please confirm your password is same!");  
                return false;
            }
            else if (ps == pscfm) {
                return true;
            }     
        }                              
    </script>  
    
</body>     
</html>