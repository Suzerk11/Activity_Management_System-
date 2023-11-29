<!DOCTYPE html>
<html>
<head>
    <title>Game Over</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 100px;
        }

        h1 {
            color: #ff3333;
        }

        p {
            color: #666;
        }

        a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>You logout sucessfully.</h1>
    <p>Thank you!</p>
    <a href="index.php">Return to login page.</a>
    <form action="?command=login_page" method="post">
        <button type="submit" class="btn btn-primary">login</button>
    </form>
</body>
</html>
