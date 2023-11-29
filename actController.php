<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  enrollActivities();
}

function getActivities()
{
  // require_once('database.php');
  require_once('./functions/Database.php');
  $db = new Database();
  $res = $db->query("select * from activity order by actid");
  return json_encode($res);
}



function enrollActivities()
{
  // require_once('database.php');
  require_once('./functions/Database.php');

  if (isset($_POST['actId'])) {
    $actId = $_POST['actId'];
    updateActivities($actId);
  } else {
    // echo 'Enrollment failed: Invalid ID';
  }
}

function updateActivities($actId)
{
  session_start();
  $db = new Database();
  // update the activity
  // echo $_SESSION["user_id"];

  $userId = $_SESSION["user_id"];
  // $userId = 1;
  // echo $_SESSION["user_id"];

  $res = $db->query("update activity set enrolledUserList = array_append(enrolledUserList, $userId) where actid = $actId");
  $res = $db->query("select * from activity order by actid");
  // print_r($res);

  // should update the user
  $db->query("update users set enroll_list = array_append(enroll_list, $actId) where user_id = $userId");

  header('Content-Type: application/json');
  echo json_encode($res);
}
