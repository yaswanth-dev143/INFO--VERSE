<?php
session_start();//it will start the session

include("connection.php");
include("functions.php");

    $user_data = check_login($con);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            REGISTER
        </title>
    </head>
    <body>
        <section>
            <a href= "logout.php">Logout</a>
            <h1>This is the index page</h1><br>
            Hello, <?php echo $user_data['frist_name']?>
        </section>
    </body>
</html>