<?php 
include "db.php";
include "justHelp.php";

$postID = isset($_GET['id']) ? clean_data((int)$_GET['id']) : null; 

if (!$postID)  {
    redirect('adminPart/allArticls.php');
}

$article = query_one("SELECT * FROM `posts` WHERE id = $postID");

if (!$article) {
    message('warning', 'Post not found');
} else {
    $title = $article["title"];
    $text = $article["text"];


    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $title = isset($_POST["title"]) ? clean_data($_POST["title"]) : null; 
        $text = isset($_POST["text"]) ? clean_data($_POST["text"]) : null;

        if (!$title || !$text) {  // || = or
            message('warning', 'Please enter all data');
        } else {
            execute_query("UPDATE `posts` SET `title`='$title',`text`='$text' WHERE `posts`.`id` = $postID");
            redirect("adminPart/allArticls.php");
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

    <?php if ($article): ?>
       Change Article
        <form method="POST">
            <label>Title</label>
            <textarea name="title" rows=3 cols=40 ></textarea><br>

            <label>text</label>
            <textarea name="text" rows=10 cols=40 ></textarea><br>

            <button class="test" type="submit"> Create </button> 
        </form>
    <?php endif ?>
</body>
</html>