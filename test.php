<?php
require_once('database.php');

session_start();
$db = new Database();
$actId = 2;
updateActivities($actId);

function updateActivities($actId)
{
  // session_start();
  $db = new Database();

  // $userId = $_SESSION["user_id"];
  $userId = 2;
  // echo $_SESSION["user_id"];
  $enrolledUserList = search();
  print_r($enrolledUserList);
  // if (in_array($userId, $enrolledUserList)) {
  //   // $_SESSION['enrollwrong'] = '1';
  //   echo '111';
  // } else {
  //   echo '222';
  //   // $_SESSION['enrollwrong'] = '0';

  //   $res = $db->query("update activity set enrolledUserList = array_append(enrolledUserList, $userId) where actid = $actId");

  //   // should update the user
  //   // $db->query("update users set enroll_list = array_append(enroll_list, $actId) where user_id = $userId");
  // }
  $res = $db->query("select * from activity order by actid");



  header('Content-Type: application/json');
  echo json_encode($res);
}

function search()
{
  $db = new Database();
  // $actId = $_POST['actId'];
  $actId = 1;
  $enrolledUserList = $db->query("SELECT * FROM activity WHERE actid = $actId");
  print_r($enrolledUserList[0]);
  $enrolledUserList = explode(',', str_replace(['{', '}', ' '], '', $enrolledUserList[0]['enrolleduserlist']));
  return $enrolledUserList;
}
