<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

// spl_autoload_register(function ($classname) {
//   include "./functions/$classname.php";
// });

include './functions/UserController.php';
$user = new UserController($_GET);

$user->run();
