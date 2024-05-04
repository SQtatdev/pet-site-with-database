<?php
session_start();


function get_user() {
    if (user_logged_in()) {
        return $_SESSION["user"];
    }
    return null;
}

function get_user_email() {
    if (user_logged_in()) {
        $user = get_user();     // ---
        return $user["email"];  // return get_user()["email"]
    }
    return null;
}


function user_logged_in() {
    return isset($_SESSION["user"]);
}


function get_user_id() {
    if (user_logged_in()) {
        $user = get_user();
        return $user["id"];
    }
    return null;
}


function set_user($user_data) {
    $_SESSION["user"] = $user_data;    
}

function redirect($file) {
    $config = config();
    header("Location: ". $config['url'] . "/" . $file);
}


function message($type, $text = null) {
    if(!isset($_SESSION["messages"])) {
        $_SESSION["messages"] = [];
    }
    if ($text) {
        $_SESSION["messages"][$type] = $text;
    } else {
        $message = $_SESSION["messages"][$type] ?? null;
        unset($_SESSION["messages"][$type]);
        echo "<p class=\"$type\">$message</p>";
    }
}

function config() {
    return include "config.php";
};


function dd($data = null) {
    var_dump($data); die();
}