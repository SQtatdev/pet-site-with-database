<?php 
include "db.php";
include "justHelp.php";

$id = isset($_GET['id']) ? clean_data((int)$_GET['id']) : null;
if (!$id) {
    redirect("adminPart/allArticls.php");
}


execute_query("DELETE FROM `posts` WHERE `id` = $id");
redirect("adminPart/allArticls.php");
?>