<?php
include "db.php";
include "justHelp.php";

if(!empty($_POST)) { 
    $full_name= $_POST["full_name"] ?? null;
    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;
    $password_2 = $_POST["password_2"] ?? null;

    if(!$full_name or !$email or !$password or !$password_2) {
        message('warning', 'Text error');
    } else if($password != $password_2){
        message('warning', 'Password error');
    } else { 
        $user = query_one("SELECT * FROM usersdb WHERE email= '$email' LIMIT 1");
        if($user != null){
            message('warning', 'Email error');
        } else {
            execute_query("INSERT INTO `usersdb`(`full_name`, `email`, `password`) VALUES ('$full_name','$email','$password')");
            message('success', 'Registration successful');
            redirect("adminPart/logIn.php");
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
    <?= message('warning') ?>  
    <form method="POST">
        <label>Full name</label>
        <input value="<?= $_POST['name'] ?? '' ?>" type="text" name="full_name" placeholder="Oliver Smith"><br>

        <label>Email</label>
        <input value="<?= $_POST['email'] ?? '' ?>" type="text" name="email" placeholder="example@gmail.com"><br>

        <label>password</label>
        <input type="password" name="password" placeholder="OliverSmith1234"><br>

        <label>password </label>
        <input type="password" name="password_2" placeholder="Repeat password"><br>

         <button class="test" type="submit"> Registration </button> 
    </form> 
</body>
</html>