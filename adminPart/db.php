<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$dbName = 'newproject';

$link = mysqli_connect($host, $user, $password, $dbName);

if (mysqli_connect_errno()) {
   die('Failed to connect');
}

function execute_query($query){ 
   global $link;
   $result = mysqli_query($link, $query);
   if (!$result){
      echo mysqli_error($link); 
      die();
   }
   return $result;
}


function  clean_data($data) {
   global $link;
   return mysqli_real_escape_string($link, htmlspecialchars($data));

}

function query_one($query) {
   $result = execute_query($query);
   return mysqli_fetch_assoc($result);
}



function query_all($query) {
   $result = execute_query($query);
   return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

