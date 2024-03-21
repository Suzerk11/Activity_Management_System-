<!DOCTYPE html>
<html lang="en">

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
                <?= $message ?>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1>User Register</h1>


                <form action="?command=register" method="post">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="user_name">Username:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter your username">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="user_id">Digital ID:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter your Computing ID">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="passwd">Password:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Enter your password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="invite_code">Invite Code:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="invite_code" name="invite_code" placeholder="Enter your invite code">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="user_email">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter your email">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>


            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>