<?php

$host = 'db';
$port = '5432';
$database = "example";
$user = "localuser";
$password = "cs4640LocalUser!";


$dbHandle = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

if ($dbHandle) {
  echo "Success connecting to database";
} else {
  echo "An error occurred connecting to the database";
}


// 执行查询
$query = "SELECT * FROM users"; // 选择要查询的表
$result = pg_query($dbHandle, $query);

// 检查查询是否成功
if (!$result) {
    die("查询失败");
}

// 打印表格头

echo "<table border='1'>
    <tr>
        <th>User ID</th>
        <th>Passwd</th>
        <th>User Name</th>
        <th>Invite Code</th>
        <th>Activity List</th>
        <th>Enroll List</th>
        <th>Favorite List</th>
        <th>User Email</th>
    </tr>";

// 逐行打印表格数据
while ($row = pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['user_id'] . "</td>";
    echo "<td>" . $row['passwd'] . "</td>";
    echo "<td>" . $row['user_name'] . "</td>";
    echo "<td>" . $row['invite_code'] . "</td>";
    echo "<td>" . $row['activity_list'] . "</td>";
    echo "<td>" . $row['enroll_list'] . "</td>";
    echo "<td>" . $row['favo_list'] . "</td>";
    echo "<td>" . $row['user_email'] . "</td>";
    echo "</tr>";
}