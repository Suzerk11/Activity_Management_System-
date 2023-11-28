<?php
require_once('database.php');

// session_start();
// $user_id = $_SESSION['user_id'];
$user_id = '123';

$res = $db->query("select * from users where user_id = $user_id");


// 打印结果，你可以根据需要进一步处理
print_r($res);
// ['enroll_list']