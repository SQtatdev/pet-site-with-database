<?php
include "db.php";
include "justHelp.php";


$articls = query_all("SELECT * FROM `posts`");



?>
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet">
<title>Page Title</title>
<a> </a>
</head>
<body>
    <?php if (!user_logged_in()): ?> 
        <?php redirect("logIn.php") ?>
    <?php endif ?>

    <?php if ($articls == null): ?>
        <p> No timers </p> 
        <a href="addArticls.php"> Create new article </a>
    <?php else: ?>
        <?php foreach($articls as $article): ?>
            <a class="echo"> Title -  </a> <?= $article["title"] ?> <br> 
            <a class="echo"> Created_at - </a> <?= $article["created_at"] ?> </div> <a href="changeArticle.php?id=<?= $article["id"] ?>"> Change </a>|<a href="deleteArticle.php?id=<?=$article["id"] ?>"> Delete </a> <br>
            <a class="echo"> Text: </a> <?= $article["text"] ?> </div>  <br><br><br><br>
        <?php endforeach ?> 
    <?php endif ?>
</body>
</html>