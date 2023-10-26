<?php
// session_start();//it will start the session

//     include("connection.php");
//     include("functions.php");
//         if($_SERVER['REQUEST_METHOD']=="POST")
//         {
//             //something was posted
//             $frist_name = $_POST['frist_name'];
//             $last_name = $_POST['last_name'];
//             $user_email = $_POST['user_email'];
//             $password = $_POST['password'];
//             if(!empty($user_email) && !empty($password) && !is_numeric($user_fristname) && !is_numeric($user_lastname))
//             {
//                 //read form the database
//                 $query = "select * from users where user_email = '$user_email' limit 1"; 

//                 $result = mysqli_query($con,$query);
//                 if($result)
//                 {
//                     if($result && mysqli_num_rows($result) > 0)
//                     {
//                         $user_data = mysqli_fetch_assoc($result);

//                         if($user_data['password'] === $password)
//                         {
//                             $_SESSION['user_id'] = $user_data['user_id'];
//                             header("Location: landingp.html");
//                             die();                           
//                         }
//                     }                    
//                 }
//                 echo "<script>alert(' Wrong username and password!!');</script>";

//             }
//             else
//             {
//                 echo "Please enter some valid information!";
//             }
//         }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name = "viewport" content ="width=device-width, initial-scale = 1.0">
        <link rel="stylesheet" href="login.css">
        <title>Login Page</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    </head>
    <script>
            function formValidator(){
                var name=document.getElementById("name");
                var spass=document.getElementById("spass");
                if(notempty(name,"name can't be null")){
                    if(isAlphaNumeric(name,"please enter only letters for your name")){
                    if(lengthrestriction(name,6)){
                    if(notempty(spass,"please enter your password")){
                    if(lengthrestriction(spass,6))
                    {
                        if(isAlphaNumeric(spass,"please enter letters and numbers in the password"))
                        {
                        return true;
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
function isAlphaNumeric(elem,helperMsg){
    var alphaExp = /^[0-9a-zA-Z]+$/;
    if(elem.value.match(alphaExp)){
    return true;
    }
    else{
    alert(helperMsg);
    elem.focus();
    return false;
    }
    }
}
    </script>
    <body>
    <div class="container">
        <div class="wrapper">
            <form onsubmit='return formValidator()' method="post">
                <h1>Login</h1>
                <div class ="input-box">
                    <input type="text" id="name" name="user_email" placeholder="User E-mail">
                    <i class="bx bxs-user"></i>
                </div>
                <div class ="input-box">
                    <input type="password" name=" password" placeholder="Password" id="spass">
                    <i class="bx bxs-lock-alt"></i>
                </div>            
                <button type="Submit" class="btn">Login</button>
                <div class="register-link">
                    <p>Don't have an account?<a href="signup.php">Signup</a></p>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>