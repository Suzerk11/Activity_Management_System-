  <!DOCTYPE html>
  <html>

  <head>
    <meta name="author" content="Rui Xu & Yixuan Ren">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is our project for CS 4640.">
    <meta name="keywords" content="chrome">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ActivityDetails</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet/less" type="text/css" href="./style/actipage.less">
  </head>

  <body onload='getDetailsData()'>
    <div style="height: 100%;">
      <!-- nav -->
      <div class="navigation">
        <div class="listbox">
          <svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" width="40" height="200">
            <path d="M133.310936 296.552327l757.206115 0c19.781623 0 35.950949-16.169326 35.950949-35.950949 0-19.781623-15.997312-35.950949-35.950949-35.950949L133.310936 224.650428c-19.781623 0-35.950949 16.169326-35.950949 35.950949C97.359987 280.383 113.529313 296.552327 133.310936 296.552327z" fill="#ffffff"></path>
            <path d="M890.51705 476.135058 133.310936 476.135058c-19.781623 0-35.950949 16.169326-35.950949 35.950949 0 19.781623 16.169326 35.950949 35.950949 35.950949l757.206115 0c19.781623 0 35.950949-16.169326 35.950949-35.950949C926.467999 492.304384 910.298673 476.135058 890.51705 476.135058z" fill="#ffffff"></path>
            <path d="M890.51705 727.447673 133.310936 727.447673c-19.781623 0-35.950949 15.997312-35.950949 35.950949s16.169326 35.950949 35.950949 35.950949l757.206115 0c19.781623 0 35.950949-15.997312 35.950949-35.950949S910.298673 727.447673 890.51705 727.447673z" fill="#ffffff"></path>

          </svg>
          <img src="./img/logo.png" alt="ops" class="imgbox activenav">

        </div>
        <!-- <a href="./activityRec.html" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1"
          xmlns="http://www.w3.org/2000/svg"> -->
        <a href="./activityRec.php" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <path d="M864 128H160c-17.6 0-32 14.4-32 32v704c0 17.6 14.4 32 32 32h704c17.6 0 32-14.4 32-32V160c0-17.6-14.4-32-32-32zM768 640H256v-64h512v64z m0-192H256v-64h512v64z">
            </path>
          </svg><span>UVA Activity</span></a>
        <a href="./activityPos.php" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <path d="M686.4 224c-6.4-6.4-6.4-16 0-22.4l68-68c6.4-6.4 16-6.4 22.4 0l112.8 112.8c6.4 6.4 6.4 16 0 22.4l-68 68c-6.4 6.4-16 6.4-22.4 0L686.4 224zM384 776l372-372c5.6-5.6 4.8-15.2-1.6-20.8L641.6 269.6c-6.4-6.4-16-7.2-20.8-1.6L248 640l-56 192 192-56zM64 896v64h896v-64H64z">
            </path>
          </svg><span>Posted ACT</span></a>
        <a href="#" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <path d="M896 320H128V160c0-17.6 14.4-32 32-32h704c17.6 0 32 14.4 32 32v160zM320 896H160c-17.6 0-32-14.4-32-32V384h192v512zM864 896H384V384h512v480c0 17.6-14.4 32-32 32z">
            </path>
          </svg><span>Schedule</span></a>
        <a href="./favourites.php" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <path d="M519.2 807.2l255.2 133.6c12 6.4 25.6-4 23.2-16.8L748.8 640c-0.8-4.8 0.8-10.4 4.8-14.4L960 424.8c9.6-9.6 4-25.6-8.8-27.2l-284.8-41.6c-5.6-0.8-9.6-4-12-8.8l-128-257.6c-5.6-12-23.2-12-28.8 0L370.4 348c-2.4 4.8-7.2 8-12 8.8L73.6 398.4c-13.6 1.6-18.4 17.6-8.8 27.2l206.4 200.8c4 4 5.6 8.8 4.8 14.4l-48.8 284c-2.4 12.8 11.2 23.2 23.2 16.8L505.6 808c4-3.2 8.8-3.2 13.6-0.8z">
            </path>
          </svg><span>Favourites</span></a>
        <a href="#" class="box"><svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <path d="M500 128.8c-95.2 5.6-173.6 83.2-180 178.4-7.2 112 80.8 205.6 191.2 205.6 106.4 0 192-86.4 192-192 0.8-110.4-92-198.4-203.2-192zM512 575.2c-128 0-383.2 64-383.2 192v96c0 17.6 14.4 32 32 32h702.4c17.6 0 32-14.4 32-32V766.4c0-127.2-255.2-191.2-383.2-191.2z">
            </path>
          </svg><span>My Profile</span></a>
      </div>
      <!-- main page -->
      <main class="mainbox">
        <nav aria-label="breadcrumb" class="breadcrumb mt-1">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./homepage.php">Homepage</a></li>
            <li class="breadcrumb-item"><a href="./activityRec.php">Rec Activity</a></li>
            <li class="breadcrumb-item"><a href="./activityPos.php">Pos Activity</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['id']; ?></li>

          </ol>
        </nav>
        <!-- line of posted activities -->
        <div class="d-flex flex-wrap">
          <h1 class="headline"></h1>
          <a href="#" class="btn btn-outline-secondary btn-outline-success cate-tag ms-3"></a>
          <button type="button" class="btn btn-primary ms-4 enroll-button">Enroll</button>
          <button type="button" class="btn btn-primary ms-4 drop-button">Drop</button>

        </div>

        <!-- img -->
        <div class="card m-2 p-2" style="background-color: rgba(240, 240, 240, 0.5); ">
          <div class="card" style="width: 10rem;">
            <img class='imgboxs' src="#" alt="#">
          </div>
        </div>

        <!-- details -->
        <div class="activity-details card m-2 p-2" style="background-color: rgba(240, 240, 240, 0.5);" id="activityDetails">
          <div class="d-flex flex-wrap">
            <label><strong>Date: </strong></label><span class='ms-2' id='actdate'></span>
          </div>
          <div class="d-flex flex-wrap">
            <label><strong>Begin Time: </strong></label><span class='ms-2' id='actbegintime'></span>
          </div>
          <div class="d-flex flex-wrap">
            <label><strong>End Time: </strong></label><span class='ms-2' id='actendtime'></span>
          </div>
          <div class="d-flex flex-wrap">
            <label><strong>Location: </strong></label><span class='ms-2' id='actloc'></span>
          </div>
          <div class="d-flex flex-wrap">
            <label><strong>Enrollment Status: </strong></label><span class='ms-2' id='enrollmentStatus'></span>
          </div>
          <div class="d-flex flex-wrap">
            <label><strong>Poster: </strong></label><span class='ms-2' id='user_id'></span>
          </div>
          <div class="d-flex flex-wrap">
            <label><strong>Contact: </strong></label><span class='ms-2' id='useremail'></span>
          </div>

          <label><strong>Activity Description: </strong></label><span id='actdesc'></span>

        </div>


      </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/less"></script>
    <script>
      // cate should be modified
      const cate = {
        1: "Sports and Fitness",
        2: "Arts and Culture",
        3: "Entertainment",
        4: "Food and Dining",
        5: "Travel and Adventure"
      }
      let data = []
      const actId = <?php echo $_GET['id']; ?>;

      // $(document).ready(function() {
      function getDetailsData() {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'detailsController.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // console.log(xhr.responseText);
            data = JSON.parse(xhr.responseText)
            // console.log(data);
            renderPage(data)
          }
        };
        // xhr.send('actId=' + actId);
        xhr.send('actId=' + actId + '&action=getData');
      }

      function renderPage(data) {
        $('.headline').text(data['actname']);
        const imgList = data['actpic'].replace(/[{} ]/g, '').split(',');
        let userListArray = []
        if (data['enrolleduserlist'] == '{}') {
          userListArray = [];
        } else {
          userListArray = data['enrolleduserlist'].replace(/[{} ]/g, '').split(',');
        }
        // console.log(imgList[0]);
        $('.imgboxs').attr('src', imgList[0]);
        $('.cate-tag').text(cate[data['actcate']])
        $('#actbegintime').text(data['actbegintime'])
        $('#actendtime').text(data['actendtime'])
        $('#actdate').text(data['actdate'])

        $('#actloc').text(data['actloc'])
        const enrollNum = userListArray.length
        const status = enrollNum + '/' + data['actlimit'];
        $('#enrollmentStatus').text(status)
        $('#user_id').text(data['user_id'])
        $('#useremail').text(data['useremail'])
        $('#actdesc').text(data['actdesc'])

      }

      $('.enroll-button').on('click', () => {
        enrollUser(actId)
      })

      $('.drop-button').on('click', () => {
        dropActivity(actId)
      })

      function enrollUser(id) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'detailsController.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // if already enrolled
            if (xhr.responseText.includes('already_enrolled')) {
              alert('Enrollment failed. You are already in this activity.');
            } else {
              console.log(JSON.parse(xhr.responseText));

              renderPage(JSON.parse(xhr.responseText)[0]);
            }
          }
        };
        // console.log(id);
        xhr.send('actId=' + id + '&action=enroll');
      }

      function dropActivity(id) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'detailsController.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            // not enrolled cannot_drop
            if (xhr.responseText.includes('cannot_drop')) {
              alert('Drop failed. You are not in this activity.');
            } else {
              renderPage(JSON.parse(xhr.responseText)[0]);
            }
          }
        };
        xhr.send('actId=' + id + '&action=drop');
      }


      // });
    </script>
  </body>

  </html>