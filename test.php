<?php
require_once('database.php');

session_start();
$db = new Database();
// $res = $db->query("insert into activity (actName,
// actLoc,actDate,actBeginTime,actEndTime,actLimit,actCate,user_id,userEmail,
// actDesc,actPic,enrolledUserList) values 
//     ($1, $2, $3, $4, $5,$6, $7, $8, $9 ,$10, $11, $12);");
$data = json_decode(
  file_get_contents("./test.json"),
  true
);

$query = "INSERT INTO activity (actName, actLoc, actDate, actBeginTime, actEndTime, actLimit, actCate, user_id, userEmail, actDesc, actPic, enrolledUserList) 
VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12)";

// $data = json_decode($_POST['data']);
// modify
$actPicArray = '{' . implode(',', $data["actPic"]) . '}';
$enrolledUserListArray = '{' . implode(',', $data["enrolledUserList"]) . '}';

// 执行带参数的查询
$res = $db->query(
  $query,
  $data["actName"],
  $data["actLoc"],
  $data["actDate"],
  $data["actBeginTime"],
  $data["actEndTime"],
  $data["actLimit"],
  $data["actCate"],
  // $data["user_id"],
  '1',
  '1186@111.com',
  // $data["userEmail"],
  $data["actDesc"],
  $actPicArray,
  $enrolledUserListArray
);

$res = $db->query("select * from activity order by actid");
header('Content-Type: application/json');
echo json_encode($res);
