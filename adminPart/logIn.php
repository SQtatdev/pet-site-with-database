<?php
include "db.php";
include "justHelp.php";

if (user_logged_in()) {
    redirect("adminPart/addArticls.php");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email = isset($_POST["email"]) ? clean_data($_POST["email"]) : null;
    $password = isset($_POST["password"]) ? clean_data($_POST["password"]) : null;

    if(!$email or !$password) {
        message('warning', 'Input error');
    } else {
        $user = query_one("SELECT * FROM usersdb WHERE email= '$email' AND password= '$password' LIMIT 1 ");
        if($user == null){
            message('warning', 'User is not found');
        } else {
            set_user([
                "id" => $user["id"],
                // "email" => $user["email"],
            ]);
            redirect("adminPart/addArticls.php");
        }
    } 
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Web form</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <form method="POST">

            <label>Email</label>
            <input type="text" name="email"><br>

            <label>password</label>
            <input type="password" name="password"><br>

            <button class="test" type="submit"> Log in </button> 
            <a class="reg" href="regestration.php"> Registration </a>
    </form> 
</body>
</html>