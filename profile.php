<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
    }

    .profile-container {
      width: 60%;
      margin: 20px auto;
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
    }

    .profile-header {
      background-color: #e0e0e0;
      padding: 20px;
      text-align: center;
    }

    .profile-content {
      padding: 20px;
    }

    .profile-row {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .profile-label {
      width: 20%;
      font-weight: bold;
    }

    .profile-value {
      width: 80%;
      padding-left: 10px;
    }

    .profile-value-nc {
      width: 80%;
      padding-left: 10px;
    }

    .profile-edit {
      text-align: right;
      padding-top: 10px;
    }

    .edit-btn {
      padding: 5px 15px;
      border: none;
      border-radius: 5px;
      background-color: #d0e0ff;
      cursor: pointer;
    }

    .save-btn {
      padding: 5px 15px;
      border: none;
      border-radius: 5px;
      background-color: #d0e0ff;
      cursor: pointer;
      display: none;
    }

    .logout-link {
      text-align: center;
      display: flex;
      display: inline-block;
      padding: 10px 20px;
      background-color: #007BFF;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      justify-content: center;
    }

    .logout-link:hover {
      background-color: #0056b3;
      justify-content: center;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet/less" type="text/css" href="./style/actipage.less">
  <link rel="stylesheet" href="style/homepage.css">
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

    <main class="mainbox">

      <nav aria-label="breadcrumb" class="breadcrumb mt-1">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./homepage.php">Homepage</a></li>
          <li class="breadcrumb-item active" aria-current="page">My Profile</li>
        </ol>
      </nav>
      <div class="col-md-9" id="main-content" style="margin: auto;">
        <nav aria-label="breadcrumb" class="breadcrumb mt-1">
          <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="#">Homepage</a></li> -->
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
          </ol>
        </nav>
        <div class="profile-container">

          <div class="profile-content">
            <div class="profile-row">
              <div class="profile-label">digital ID</div>
              <div class="profile-value-nc" id="user_id"><?= $_SESSION["user_id"] ?></div>
            </div>
            <div class="profile-row">
              <div class="profile-label">Name</div>
              <div class="profile-value" id="user_name"><?= $_SESSION["user_name"] ?></div>
            </div>
            <div class="profile-row">
              <div class="profile-label">Email</div>
              <div class="profile-value" id="profileEmail"><?= $_SESSION["user_email"] ?></div>
            </div>
            <div class="profile-row">
              <div class="profile-label">Invite Code</div>
              <div class="profile-value" id="invite_code"><?= $_SESSION["invite_code"] ?></div>
            </div>

            <div class="profile-edit">
              <button class="edit-btn" onclick="editProfile()">Edit</button>
              <button class="save-btn" onclick="saveProfile()">Save</button>
            </div>
          </div>
        </div>
      </div>
      <div>
        <a href="index.php?command=logout" class="logout-link" style="display: flex;">Logout here</a>
      </div>
    </main>
  </div>
  <script>
    function getUserInfo() {
      // Instantiate the object and open the AJAX request to our backend
      var ajax = new XMLHttpRequest();
      ajax.open("GET", "./function/UserCotroller.php", true);

      // Send the request
      ajax.send(null);

      // Event Listener for when the AJAX request loads
      ajax.addEventListener("load", function() {
        // display the question
        if (this.status == 200) {
          res = JSON.parse(ajax.responseText)
          displayInfo();
        } else {
          // Error message
          document.getElementById("message").innerHTML = "An error occurred";
        }
      });
    }

    function displayInfo() {
      document.getElementById("user_id").innerHTML = res.user_id;
      document.getElementById("user_name").innerHTML = res.user_name;
    }

    function editProfile() {
      // Get all profile value elements
      var profileValues = document.querySelectorAll('.profile-value');

      // Replace text with an editable input field
      profileValues.forEach(function(value) {
        var input = document.createElement('input');
        input.type = 'text';
        input.value = value.innerText;
        input.classList.add('profile-input');
        value.innerHTML = '';
        value.appendChild(input);
      });

      // Toggle buttons visibility
      document.querySelector('.edit-btn').style.display = 'none';
      document.querySelector('.save-btn').style.display = 'inline-block';
    }

    function saveProfile() {
      // Get all input elements
      var profileInputs = document.querySelectorAll('.profile-input');

      // Replace input fields with text
      profileInputs.forEach(function(input) {
        var value = input.parentElement;
        value.innerText = input.value;
      });

      // Toggle buttons visibility
      document.querySelector('.edit-btn').style.display = 'inline-block';
      document.querySelector('.save-btn').style.display = 'none';
    }
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