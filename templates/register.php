<!DOCTYPE html>
<html  lang="en">
<head>
    <meta name="author" content="Rui Xu & Yixuan Ren">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is our project for CS 4640.">
    <meta name="keywords" content="chrome">
    <title>register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/cover.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xs-12">
                <?=$message?>
            </div>
         </div>

        <div class="card">
            <div class="card-body">
                <h1>User Register</h1>
                

                <form action="?command=register" method="post">
                    <div class="form-group">
                        <label for="user_name">Username:</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Please input your username">
                    </div>
                    <div class="form-group">
                        <label for="user_id">digitalID:</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Please input your ComputingID">
                    </div>
                    <div class="form-group">
                        <label for="passwd">password:</label>
                        <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Please input your password">
                    </div>
                    <!-- <a class="btn btn-primary" href="login.html">register</a> -->

                    <div class="form-group">
                        <label for="invite_code">password:</label>
                        <input type="text" class="form-control" id="invite_code" name="invite_code" placeholder="Please input your invitecode">
                    </div>

                    <div class="form-group">
                        <label for="user_email">password:</label>
                        <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Please input your email">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- 引入Bootstrap JavaScript文件 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
