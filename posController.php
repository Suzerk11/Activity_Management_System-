<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once('database.php');

  $action = $_POST['action'];

  switch ($action) {
    case 'delete':
      deleteActivity();
      break;
      // case 'drop':
      //   dropActivity();
      //   break;
      // case 'search':
      //   searchActivity();
      //   break;
      // case 'create':
      //   createActivity();
      //   break;
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

  $query = "SELECT * FROM activity WHERE actid IN ($actIdCondition)";

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
