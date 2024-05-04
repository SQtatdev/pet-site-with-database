<?php
include "db.php";
include "justHelp.php";

if (!user_logged_in()) {
    redirect("adminPart/logIn.php");
}
    
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $user_id = get_user_id();
    $title = isset($_POST["title"]) ? clean_data($_POST["title"]) : null;
    $text = isset($_POST["text"]) ? clean_data($_POST["text"]) : null;
    if (!$title or !$text) {
        message('warning', 'Please enter all data');
    } else {
        $article = execute_query("INSERT INTO `posts`(`user_id`, `title`, `text`, `created_at`) VALUES ('$user_id','$title','$text',NOW())");
        redirect("adminPart/allArticls.php");
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
    <?=message('warning')?>
            Create Article
        <form method="POST">

                <label>Title</label>
                <textarea name="title" rows=3 cols=40 ></textarea><br>

                <label>text</label>
                <textarea name="text" rows=10 cols=40 ></textarea><br>

                <button class="test" type="submit"> Create </button> 
        </form> 
</body>
</html>