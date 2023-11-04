<?php
session_start();//it will start the session

    include("connection.php");
    include("functions.php");
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            //something was posted
            $frist_name = $_POST['frist_name'];
            $last_name = $_POST['last_name'];
            $user_email = $_POST['user_email'];
            $password = $_POST['password'];
            if(!empty($user_email) && !empty($password) && !is_numeric($user_fristname) && !is_numeric($user_lastname))
            {
                //save to database
                $user_id = random_num(20); 
                $query = "insert into users (user_id,frist_name,last_name,user_email,password) values ('$user_id','$frist_name','$last_name','$user_email','$password')";

                mysqli_query($con,$query);

                header("Location: login.php");
                die();
            }
            else
            {
                echo "Please enter some valid information";
            }
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign up Page</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
        <link rel="stylesheet" href="signup.css">
    </head>
        <script>
            function formValidator(){
                var fristname=document.getElementById("fristname");
                var lastname=document.getElementById("lastname");
                var smail=document.getElementById("smail");
                var spass=document.getElementById("spass");
                if(notempty(fristname,"name can't be null")){
                    if(isAlphabet(fristname,"please enter only letters for your name")){
                    if(lengthrestriction(fristname,6)){
                        if(notempty(lastname,"last name can't be null")){
                            if(isAlphabet(lastname,"please enter only letter for your lastname")){
                    if(emailvalidator(smail,"please enter valid email")){
                    if(notempty(spass,"please enter your password")){
                    if(lengthrestriction(spass,6)){
                        if(isAlphanumeric(spass,"please enter letters and numbers in the password")){
                        return true;
                    }
                }
                }
                }
                }
            }
            }
        }
    }
    return false;
}
function notempty(elem,helpermsg){
    if(elem.value.length==0){
        alert(helpermsg);
        elem.focus();
        return false;
    }
    return true;
}
function isAlphabet(elem,helpermsg){
    var alphaexp=/^[0-9a-zA-Z]+$/;
    if(elem.value.match(alphaexp)){
        return true;
    }
    else{
        alert(helpermsg);
        elem.focus();
        return false;
    }
    }
function lengthrestriction(elem,min){
    var ui=elem.value;
    if(ui.length>=min){
        return true;
    }
    else{
        alert("please enter minimum 6 characters ");
        elem.focus();
        return false;
    }
}
function emailvalidator(elem,helpermsg){
    var em=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
    if(elem.value.match(em)){
        return true;
    }
    else{
        alert(helpermsg);
        elem.focus();
        return false;
    }
function isAlphanumeric(elem,helperMsg)
    {
    var alphaExp = /^[0-9a-zA-Z]+$/;
    if(elem.value.match(alphaExp)){
    return true;
    }else
    {
    alert(helperMsg);
    elem.focus();
    return false;
    }
    }
}   
        </script>
    <body>

        <div class="wrapper">
            <form onsubmit="return formValidator()" method="post">
                <h1>Signup</h1>
                <div class ="input-box">
                    <input type="text" placeholder="Fristname" name="frist_name" id="fristname">
                    <i class="bx bxs-user"></i>
                </div>
                <div class ="input-box">
                    <input type="text" placeholder="Lastname" name="last_name" id="lastname">
                    <i class="bx bxs-user"></i>
                </div>
                <div class ="input-box">
                    <input type="text" placeholder="E-mail" name="user_email" id="smail">
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class ="input-box">
                    <input type="password" placeholder="Password" name="password" id="spass">
                    <i class="bx bxs-lock-alt"></i>
                </div>            
                <button type="Submit" class="btn">Signup</button>
                <div class="register-link">
                    <p>Don't have an account?<a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </body>
</html>