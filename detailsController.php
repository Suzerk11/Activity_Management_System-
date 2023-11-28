<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   getActivityDetails();
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once('database.php');

  if ($_POST['action'] === 'enroll') {
    enrollActivity();
  } elseif ($_POST['action'] === 'drop') {
    dropActivity();
  } else {
    getActivityDetails();
  }
}

function getActivityDetails()
{
  require_once('database.php');
  $db = new Database();
  $actId = $_POST['actId'];
  $res = $db->query("select * from activity where actid = $actId");
  header('Content-Type: application/json');
  // print_r($res);
  echo json_encode($res[0]);
}

function enrollActivity()
{
  session_start();
  $db = new Database();
  $actId = $_POST['actId'];

  // $userId = $_SESSION["user_id"];
  $userId = 2;
  // echo $_SESSION["user_id"];
  $enrolledUserList = search();
  if (in_array($userId, $enrolledUserList)) {
    echo 'already_enrolled';
  } else {

    $res = $db->query("update activity set enrolledUserList = array_append(enrolledUserList, $userId) where actid = $actId");

    // should update the user
    // $db->query("update users set enroll_list = array_append(enroll_list, $actId) where user_id = $userId");
  }
  $res = $db->query("select * from activity where actid = $actId");

  header('Content-Type: application/json');
  echo json_encode($res);
}

function dropActivity()
{
  session_start();
  $db = new Database();

  $actId = $_POST['actId'];
  // $userId = $_SESSION["user_id"];
  $userId = 2;
  // update the activity
  $enrolledUserList = search();

  if (in_array($userId, $enrolledUserList)) {
    $res = $db->query("update activity set enrolledUserList = array_remove(enrolledUserList, $userId) where actid = $actId");

    // should update the user
    // $db->query("update users set enroll_list = array_append(enroll_list, $actId) where user_id = $userId");

  } else {
    echo 'cannot_drop';
    // $_SESSION['dropwrong'] = '1';
  }
  $res = $db->query("select * from activity where actid = $actId");
  header('Content-Type: application/json');
  echo json_encode($res);
}


function search()
{
  $db = new Database();
  $actId = $_POST['actId'];
  // $actId = 1;
  $enrolledUserList = $db->query("SELECT * FROM activity WHERE actid = $actId");
  $enrolledUserList = explode(',', str_replace(['{', '}', ' '], '', $enrolledUserList[0]['enrolleduserlist']));
  return $enrolledUserList;
}
