<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="author" content="Rui Xu & Yixuan Ren">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="This is our project for CS 4640.">
  <meta name="keywords" content="chrome">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schedule</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet/less" type="text/css" href="./style/actipage.less">
  <link rel="stylesheet" href="style/homepage.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
    }

    .schedule-container {

      width: 100%;
      margin: 10px auto;
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      padding: 10px;


    }

    .schedule-header {
      grid-column: 1 / -1;
      /* Span all columns */
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background-color: #e0e0e0;
    }

    .schedule-header button {
      padding: 5px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .event {
      background-color: #f9f9f9;
      border: 1px solid #e0e0e0;
      border-radius: 5px;
      padding: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;

      /* width: 220px; */

    }

    .event-date {
      background-color: #d0e0ff;
      padding: 5px 10px;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .event-description h5 {
      margin: 0;
      padding: 0;
    }

    .event-time {
      margin-top: auto;
      padding-top: 10px;
      color: #555;
      width: 100%;
      text-align: center;
      border-top: 1px solid #e0e0e0;
    }

    .activity-card {
      padding: 5%;
    }
  </style>

</head>

<body>
  <div style="height: 100%;">
    <!-- nav -->
    <div class="navigation">
      <div class="listbox">
        <svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="200">
          <path d="M133.310936 296.552327l757.206115 0c19.781623 0 35.950949-16.169326 35.950949-35.950949 0-19.781623-15.997312-35.950949-35.950949-35.950949L133.310936 224.650428c-19.781623 0-35.950949 16.169326-35.950949 35.950949C97.359987 280.383 113.529313 296.552327 133.310936 296.552327z" fill="#ffffff"></path>
          <path d="M890.51705 476.135058 133.310936 476.135058c-19.781623 0-35.950949 16.169326-35.950949 35.950949 0 19.781623 16.169326 35.950949 35.950949 35.950949l757.206115 0c19.781623 0 35.950949-16.169326 35.950949-35.950949C926.467999 492.304384 910.298673 476.135058 890.51705 476.135058z" fill="#ffffff"></path>
          <path d="M890.51705 727.447673 133.310936 727.447673c-19.781623 0-35.950949 15.997312-35.950949 35.950949s16.169326 35.950949 35.950949 35.950949l757.206115 0c19.781623 0 35.950949-15.997312 35.950949-35.950949S910.298673 727.447673 890.51705 727.447673z" fill="#ffffff"></path>

        </svg>
        <img src="./img/logo.png" alt="ops" class="imgbox activenav
      ">

      </div>
      <a href="./activityRec.php" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <path d="M864 128H160c-17.6 0-32 14.4-32 32v704c0 17.6 14.4 32 32 32h704c17.6 0 32-14.4 32-32V160c0-17.6-14.4-32-32-32zM768 640H256v-64h512v64z m0-192H256v-64h512v64z">
          </path>
        </svg><span>UVA Activity</span></a>
      <a href="./activityPos.php" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <path d="M686.4 224c-6.4-6.4-6.4-16 0-22.4l68-68c6.4-6.4 16-6.4 22.4 0l112.8 112.8c6.4 6.4 6.4 16 0 22.4l-68 68c-6.4 6.4-16 6.4-22.4 0L686.4 224zM384 776l372-372c5.6-5.6 4.8-15.2-1.6-20.8L641.6 269.6c-6.4-6.4-16-7.2-20.8-1.6L248 640l-56 192 192-56zM64 896v64h896v-64H64z">
          </path>
        </svg><span>Posted ACT</span></a>
      <a href="./schedule.php" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <path d="M896 320H128V160c0-17.6 14.4-32 32-32h704c17.6 0 32 14.4 32 32v160zM320 896H160c-17.6 0-32-14.4-32-32V384h192v512zM864 896H384V384h512v480c0 17.6-14.4 32-32 32z">
          </path>
        </svg><span>Schedule</span></a>
      <a href="./profile.php" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <path d="M519.2 807.2l255.2 133.6c12 6.4 25.6-4 23.2-16.8L748.8 640c-0.8-4.8 0.8-10.4 4.8-14.4L960 424.8c9.6-9.6 4-25.6-8.8-27.2l-284.8-41.6c-5.6-0.8-9.6-4-12-8.8l-128-257.6c-5.6-12-23.2-12-28.8 0L370.4 348c-2.4 4.8-7.2 8-12 8.8L73.6 398.4c-13.6 1.6-18.4 17.6-8.8 27.2l206.4 200.8c4 4 5.6 8.8 4.8 14.4l-48.8 284c-2.4 12.8 11.2 23.2 23.2 16.8L505.6 808c4-3.2 8.8-3.2 13.6-0.8z">
          </path>
          <!-- </svg><span>Favourites</span></a>
      <a href="#" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <path d="M500 128.8c-95.2 5.6-173.6 83.2-180 178.4-7.2 112 80.8 205.6 191.2 205.6 106.4 0 192-86.4 192-192 0.8-110.4-92-198.4-203.2-192zM512 575.2c-128 0-383.2 64-383.2 192v96c0 17.6 14.4 32 32 32h702.4c17.6 0 32-14.4 32-32V766.4c0-127.2-255.2-191.2-383.2-191.2z">
          </path> -->
        </svg><span>My Profile</span></a>
    </div>
    <!-- main page -->
    <main class="mainbox">
      <nav aria-label="breadcrumb" class="breadcrumb mt-1">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./homepage.php">Homepage</a></li>
          <li class="breadcrumb-item active" aria-current="page">schedule</li>
        </ol>
      </nav>
      <!-- line of posted activities -->
      <div class="d-flex flex-wrap">
        <h1 class="headline">Schedule</h1>
        <!-- <button type="button" class="btn btn-primary mx-1 ms-auto">Post an Activity!</button> -->
      </div>
      <!-- <nav class="navbar bg-body-tertiary mx-1 mt-2 ps-2 card">
        <div class="container-fluid p-0">
          <form class="d-flex formstyle flex-wrap" role="search">
            <input class="form-control me-3 mt-1" type="search" placeholder="Search" aria-label="Search" style=" width: 60%">
            <select class="form-select me-3 mt-1" aria-label="Default select example" style="width: 25%;">
              <option selected>Sports</option>
              <option value="1">Career</option>
              <option value="2">Emergency</option>
              <option value="3">Seminar</option>
            </select>
            <button class="btn btn-outline-success mt-1" type="submit">Search</button>
          </form>

        </div>
      </nav> -->

      <!-- table -->
      <div class="table-responsive card mt-2 mx-1" style="
      display: flex; height: 100%;">

        <!-- act -->
        <div class="schedule-header">
          <!-- <button>Prev</button> -->
          <h2 style="font-size: 20px;">Event Schedule</h2>
          <!-- <button>Next</button> -->
        </div>

        <div class="schedule-container">


          <!-- Event 1 -->
          <div class="event">

            <?php
            include('./actController.php');
            // echo('here1');
            // error!!
            require_once('./database.php');
            // echo('here2');
            $activities = json_decode(getActivities(), true);

            $todayDate = date('Y-m-d');
            $Date = date('m-d');

            $userId = $_SESSION["user_id"];
            // echo $userId;
            echo '<div class="event-date">' . $Date . '</div>';

            foreach ($activities as $row) {
              // echo gettype($row['enrolleduserlist']);
              $enroll_list = explode(',', str_replace(array('{', '}'), '', $row['enrolleduserlist']));
              // echo $enroll_list[0];
              // echo $row['enrolleduserlist'];
              $pic = explode(',', str_replace(array('{', '}'), '', $row["actpic"]));

              if ($row['actdate'] == $todayDate && in_array($userId, $enroll_list)) {
                echo '<div class="activity-card">';
                echo '<div class="row">';
                echo '<div class="col-md-4">';
                echo '<img src="' . $pic[0] . '" class="act-img" alt="act_pic">';
                echo '</div>';
                echo '<div class="col-md-8">';
                echo '<h5>' . $row['actname'] . '</h5>';
                echo '<p>Location:' . $row['actloc'] . '</p>';
                // echo '<p>Date:' . $row['actdate'] . '</p>';
                echo '<p>Time:' . $row['actbegintime'] . '</p>';
                echo '<p>Time:' . $row['actendtime'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            }
            // echo '</div>';
            ?>
          </div>


          <!-- Event 2 -->
          <div class="event">
            <?php

            $activities = json_decode(getActivities(), true);

            $nextDate = date('Y-m-d', strtotime('+1 day', strtotime('today')));
            // echo $nextDate ;
            $Date = date('m-d', strtotime('+1 day', strtotime('today')));

            $userId = $_SESSION["user_id"];
            // echo $userId;
            echo '<div class="event-date">' . $Date . '</div>';

            foreach ($activities as $row) {
              // echo gettype($row['enrolleduserlist']);
              $enroll_list = explode(',', str_replace(array('{', '}'), '', $row['enrolleduserlist']));
              // echo $enroll_list[0];
              // echo $row['enrolleduserlist'];
              $pic = explode(',', str_replace(array('{', '}'), '', $row["actpic"]));

              if ($row['actdate'] == $nextDate && in_array($userId, $enroll_list)) {
                echo '<div class="activity-card">';
                echo '<div class="row">';
                echo '<div class="col-md-4">';
                echo '<img src="' . $pic[0] . '" class="act-img" alt="act_pic">';
                echo '</div>';
                echo '<div class="col-md-8">';
                echo '<h5>' . $row['actname'] . '</h5>';
                echo '<p>Location:' . $row['actloc'] . '</p>';
                // echo '<p>Date:' . $row['actdate'] . '</p>';
                echo '<p>Time:' . $row['actbegintime'] . '</p>';
                echo '<p>Time:' . $row['actendtime'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            }
            // echo '</div>';
            ?>
          </div>

          <!-- Event 3 -->
          <div class="event">
            <?php
            // include('actController.php');
            // echo('here1');
            // error!!
            // require_once('./functions/Database.php');
            // echo('here2');
            $activities = json_decode(getActivities(), true);

            $nextnextDate = date('Y-m-d', strtotime('+2 day', strtotime('today')));
            // echo $nextDate ;
            $Date = date('m-d', strtotime('+2 day', strtotime('today')));

            $userId = $_SESSION["user_id"];
            // echo $userId;
            echo '<div class="event-date">' . $Date . '</div>';

            foreach ($activities as $row) {
              // echo gettype($row['enrolleduserlist']);
              $enroll_list = explode(',', str_replace(array('{', '}'), '', $row['enrolleduserlist']));
              // echo $enroll_list[0];
              // echo $row['enrolleduserlist'];
              $pic = explode(',', str_replace(array('{', '}'), '', $row["actpic"]));

              if ($row['actdate'] == $nextnextDate && in_array($userId, $enroll_list)) {
                echo '<div class="activity-card">';
                echo '<div class="row">';
                echo '<div class="col-md-4">';
                echo '<img src="' . $pic[0] . '" class="act-img" alt="act_pic">';
                echo '</div>';
                echo '<div class="col-md-8">';
                echo '<h5>' . $row['actname'] . '</h5>';
                echo '<p>Location:' . $row['actloc'] . '</p>';
                // echo '<p>Date:' . $row['actdate'] . '</p>';
                echo '<p>Time:' . $row['actbegintime'] . '</p>';
                echo '<p>Time:' . $row['actendtime'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            }
            // echo '</div>';
            ?>
          </div>

        </div>
        <!-- end act -->


      </div>
    </main>
  </div>


  <script>
    const mainbox = document.querySelector('.mainbox')
    const listbox = document.querySelector('.listbox')
    const navi = document.querySelector('.navigation')
    const imgbox = document.querySelector('.imgbox')
    const spans = document.querySelectorAll('.navigation span')
    listbox.addEventListener('click', function() {
      if (imgbox.classList.contains('activenav')) {
        navi.style.width = '7%'
        for (let span of spans) {
          span.style.opacity = '0'
        }
        imgbox.classList.replace('activenav', 'shrinknav')
        mainbox.style.paddingLeft = '10%'
      } else {
        navi.style.width = '16%'
        imgbox.classList.replace('shrinknav', 'activenav')
        for (let span of spans) {
          span.style.opacity = '1'
        }
        mainbox.style.paddingLeft = '18%'


        // console.log(imgbox.classList);

      }

    })
  </script>

  <script src="https://cdn.jsdelivr.net/npm/less"></script>


</body>

</html>