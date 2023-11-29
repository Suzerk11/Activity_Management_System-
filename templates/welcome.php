<!DOCTYPE html>
<html lang="en">

<head>
    <!-- https://cs4640.cs.virginia.edu/yra7pn/sprint2/ -->
    <meta name="author" content="Rui Xu & Yixuan Ren">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is our project for CS 4640.">
    <meta name="keywords" content="chrome">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/cover.css">
    <title>web_cover</title>
    <!-- <link rel="stylesheet" href="style/main.css"> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.15.1/less.min.js"></script>
    <link rel="stylesheet/less" type="text/css" href=" style/custom.less">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>

<body>
    <div class="conindex">
        <img class="logo" src="./img/uva_1.png" alt="UVA Logo">
        <div class="header-text">
            Welcome to UVA ACT!<br>
            Login or Register right now!
        </div>
        <div class="btn-container">

            <!-- <div class="row">
                <div class="col-xs-12">
                    <?=$message?>
                </div>
            </div> -->

            <form action="?command=login_page" method="post">
                <button type="submit" class="btn-login">login</button>
            </form>
            <form action="?command=register_page" method="post">
                <button type="submit" class="btn-register">register</button>
            </form>
            <!-- <a class="btn-login" href="./templates/login.php">login</a>
            <a class="btn-register" href="./templates/register.php">register</a> -->
        </div>
    </div>

    <div class="footer">
        Designed by Yixuan & Rui
    </div>
</body>

</html>