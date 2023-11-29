<?php

// $host = 'db';
// $port = '5432';
// $database = 'bzd7cx';
// $user = 'bzd7cx';
// $password = '_xXq1xyWZk0W';

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

// // Drop sequences
$res  = pg_query($dbHandle, "drop sequence if exists user_seq cascade;");
$res  = pg_query($dbHandle, "drop sequence if exists act_seq cascade;");
// $res  = pg_query($dbHandle, "drop sequence if exists img_seq cascade;");
// $res  = pg_query($dbHandle, "drop sequence if exists cate_seq cascade;");

// # drop tables
$res  = pg_query($dbHandle, "drop table if exists users;");
$res  = pg_query($dbHandle, "drop table if exists activity;");
// $res  = pg_query($dbHandle, "drop table if exists images;");
// $res  = pg_query($dbHandle, "drop table if exists category;");

// // Create sequences
// $res  = pg_query($dbHandle, "create sequence user_seq;"); 
$res  = pg_query($dbHandle, "create sequence act_seq;");
// // $res  = pg_query($dbHandle, "create sequence img_seq;");
// $res  = pg_query($dbHandle, "create sequence cate_seq;");


// // Create tables
$res  = pg_query($dbHandle, "create table users (
  user_id int primary key,
  passwd character varying,
  user_name text,
  invite_code character(6),
  activity_list int[],
  enroll_list int[],
  favo_list int[],
  user_email character varying
);");

// activity
$res  = pg_query($dbHandle, "create table activity (
            actId  int primary key default nextval('act_seq'),
            actName character varying,
            actLoc character varying,
            actDate date,
            actBeginTime time without time zone,
            actEndTime time without time zone,
            actLimit int,
            actCate int,
            user_id int,
            userEmail character varying,
            actDesc text,
            actPic text[],
            enrolledUserList int[]
);");

// // image
// // $res  = pg_query($dbHandle, "create table images (
// //               imgid int primary key default nextval('img_seq'),
// //               imgPath text);");

// // category
// $res  = pg_query($dbHandle, "create table category (
//                 cateId  int primary key default nextval('cate_seq'),
//                 cateName text);");




// // // insert date
// // $questions = json_decode(
// //   file_get_contents("http://ford.cs.virginia.edu/trivia.json"),
// //   true
// // );
$activities = json_decode(
  file_get_contents("./mock.json"),
  true
);


$res = pg_prepare($dbHandle, "myinsert", "insert into activity (actName,
actLoc,actDate,actBeginTime,actEndTime,actLimit,actCate,user_id,userEmail,
actDesc,actPic,enrolledUserList) values 
    ($1, $2, $3, $4, $5,$6, $7, $8, $9 ,$10, $11, $12);");



foreach ($activities as $q) {
  $actPicArray = '{' . implode(',', $q["actPic"]) . '}';
  $enrolledUserListArray = '{' . implode(',', $q["enrolledUserList"]) . '}';

  $res = pg_execute(
    $dbHandle,
    "myinsert",
    [
      $q["actName"],
      $q["actLoc"],
      $q["actDate"],
      $q["actBeginTime"],
      $q["actEndTime"],
      $q["actLimit"],
      $q["actCate"],
      $q["user_id"],
      $q["userEmail"],
      $q["actDesc"],
      // $q["actPic"],
      // $q["enrolledUserList"]
      $actPicArray,
      $enrolledUserListArray
    ]
  );
}

// insert into category (catename) values ('Sports and Fitness');
// insert into category (catename) values ('Arts and Culture');
// insert into category (catename) values ('Entertainment');
// insert into category (catename) values ('Food and Dining');
// insert into category (catename) values ('Travel and Adventure');

// insert users
$query = "INSERT INTO users (user_id, passwd, user_name, invite_code, activity_list, enroll_list, favo_list, user_email)
          VALUES ($1, $2, $3, $4, $5, $6, $7, $8)";

// 设置要插入的值
$user_id = 123;
$passwd = '123';
$user_name = 'ren';
$invite_code = '123456';
$activity_list = '{1, 2, 3}';
$enroll_list = '{1, 2, 3}';
$favo_list = '{1, 2, 3}';
$user_email = 'user@example.com';

// 使用pg_query_params插入数据
$result = pg_query_params($dbHandle, $query, array($user_id, $passwd, $user_name, $invite_code, $activity_list, $enroll_list, $favo_list, $user_email));
