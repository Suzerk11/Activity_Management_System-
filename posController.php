<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once('database.php');

  $action = $_POST['action'];

  switch ($action) {
    case 'delete':
      deleteActivity();
      break;
    case 'edit':
      editActivity();
      break;
    case 'search':
      searchActivity();
      break;
    case 'create':
      createActivity();
      break;
      // default:
      //   // 处理未知的 action
      //   break;
  }
}
// session_start();
// get activities that the user post
function getActivities($user_id)
{
  // session_start();
  // $user_id = $_SESSION['user_id'];
  $db = new Database();
  $res = $db->query("select * from users where user_id = $user_id");
  if ($res[0]['activity_list'] == '{}') {
    // echo 'empty';
    return 'empty';
  }

  $actIdArray = explode(',', str_replace(['{', '}'], '', $res[0]['activity_list']));

  $actIdCondition = implode(',', $actIdArray);

  $query = "SELECT * FROM activity WHERE actid IN ($actIdCondition) order by actid";

  $res = $db->query($query);
  return json_encode($res);
}

function deleteActivity()
{
  session_start();
  $user_id = $_SESSION['user_id'];
  $actid = $_POST['actId'];
  $db = new Database();
  // update the user's activity list
  $db->query("UPDATE users SET activity_list = array_remove(activity_list, $1) WHERE user_id = $2", $actid, $user_id);
  // delete the activity
  $db->query("DELETE FROM activity WHERE actid = $1", $actid);
  $res = getActivities($user_id);
  echo $res;
}

function searchActivity()
// search activity that satiisfy the requirement and also poster is user_id
{
  session_start();
  $user_id = $_SESSION['user_id'];
  $db = new Database();
  // $user_id = '123';
  if (isset($_POST['searchid']) && isset($_POST['searchcate'])) {
    $searchid = $_POST['searchid'];
    $searchcate = $_POST['searchcate'];
    $res = $db->query("SELECT * FROM activity WHERE actid = $searchid and actcate = $searchcate and user_id = $user_id");
  } elseif (isset($_POST['searchid'])) {
    $searchid = $_POST['searchid'];
    $res = $db->query("SELECT * FROM activity WHERE actid = $searchid and user_id = $user_id");
  } else {
    $searchcate = $_POST['searchcate'];
    $res = $db->query("SELECT * FROM activity WHERE actcate = $searchcate and user_id = $user_id");
  }
  header('Content-Type: application/json');

  if ($res == []) {
    echo 'empty';
  } else {
    echo json_encode($res);
  }
}

function editActivity()
{
  session_start();
  $user_id = $_SESSION['user_id'];

  $db = new Database();
  $actid = $_POST['actid'];


  $query = "UPDATE activity SET actName = $1, actLoc =$2, actDate = $3, actBeginTime = $4, 
  actEndTime = $5, actLimit = $6, actCate = $7, userEmail = $8, actDesc = $9, actPic = $10 
  WHERE actid = $actid";

  $data = json_decode($_POST['data'], true);


  $actPicArray = '{' . implode(',', $data["actpic"]) . '}';


  $res = $db->query(
    $query,
    $data["actname"],
    $data["actloc"],
    $data["actdate"],
    $data["actbegintime"],
    $data["actendtime"],
    $data["actlimit"],
    $data["actcate"],
    $data["useremail"],
    $data["actdesc"],
    $actPicArray,
  );

  $res = getActivities($user_id);
  echo $res;
}

function createActivity()
{
  session_start();
  $db = new Database();
  // $res = $db->query("insert into activity (actName,
  // actLoc,actDate,actBeginTime,actEndTime,actLimit,actCate,user_id,userEmail,
  // actDesc,actPic,enrolledUserList) values 
  //     ($1, $2, $3, $4, $5,$6, $7, $8, $9 ,$10, $11, $12);");

  $query = "INSERT INTO activity (actName, actLoc, actDate, actBeginTime, actEndTime, actLimit, actCate, user_id, userEmail, actDesc, actPic, enrolledUserList) 
  VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12)";

  $data = json_decode($_POST['data'], true);
  // echo $data['actname'];
  // modify
  $actPicArray = '{' . implode(',', $data["actpic"]) . '}';
  $enrolledUserListArray = '{' . implode(',', $data["enrolleduserlist"]) . '}';

  // 执行带参数的查询
  $res = $db->query(
    $query,
    $data["actname"],
    $data["actloc"],
    $data["actdate"],
    $data["actbegintime"],
    $data["actendtime"],
    $data["actlimit"],
    $data["actcate"],
    $_SESSION['user_id'],
    // $data["user_id"],
    // '1',
    $data["useremail"],
    $data["actdesc"],
    $actPicArray,
    $enrolledUserListArray
  );
  $actid = $db->query('SELECT lastval()')[0]['lastval'];
  // echo $actid;
  // should update the user
  $userId = $_SESSION['user_id'];
  $db->query("update users set activity_list = array_append(activity_list, $actid) where user_id = $userId");

  $res = $db->query("select * from activity WHERE user_id = $userId order by actid");
  header('Content-Type: application/json');
  echo json_encode($res);
}
