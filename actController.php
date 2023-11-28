<?php
// session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once('database.php');

  if ($_POST['action'] === 'enroll') {
    enrollActivities();
  } elseif ($_POST['action'] === 'drop') {
    dropActivity();
  } elseif ($_POST['action'] === 'search') {
    searchActivity();
  }
}

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//   require_once('database.php');
//   echo getActivities();
// }

function getActivities()
{
  $db = new Database();
  $res = $db->query("select * from activity order by actid");
  return json_encode($res);
}

function enrollActivities()
{
  // require_once('./functions/Database.php');

  if (isset($_POST['actId'])) {
    $actId = $_POST['actId'];
    updateActivities($actId);
  } else {
    echo 'Enrollment failed: Invalid ID';
  }
}

function updateActivities($actId)
{
  session_start();
  $db = new Database();

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
  $res = $db->query("select * from activity order by actid");



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
  $res = $db->query("select * from activity order by actid");
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

function searchActivity()
{
  $db = new Database();
  if (isset($_POST['searchid']) && isset($_POST['searchcate'])) {
    $searchid = $_POST['searchid'];
    $searchcate = $_POST['searchcate'];
    $res = $db->query("SELECT * FROM activity WHERE actid = $searchid and actcate = $searchcate");
  } elseif (isset($_POST['searchid'])) {
    $searchid = $_POST['searchid'];
    $res = $db->query("SELECT * FROM activity WHERE actid = $searchid");
  } else {
    $searchcate = $_POST['searchcate'];
    $res = $db->query("SELECT * FROM activity WHERE actcate = $searchcate");
  }

  header('Content-Type: application/json');
  echo json_encode($res);
}
