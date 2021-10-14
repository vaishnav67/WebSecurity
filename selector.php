<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <style>
        p{
            margin: 0;
            padding: 20px;
        }
        h1{
            margin-bottom: 20px;
            line-height: 1.2em;
        }
        .login{
            background-color: rgba(0,0,0,.5);
            border-radius: 10px;
            width: 350px;
            padding: 20px;
            height: 370px;
        }
        .btn{
            margin-bottom: 10px;
            width: 200px;
        }
    </style>
</head>
<body>
    <form method="POST" action="#">
        <div class="login">
            <h1 style="color: white;">Authentication Required</h1>
            <p style="color: lightblue; text-align: center">Available methods</p>
            <center>
            <button type="submit" class="btn btn-primary btn-block btn-large" name="btn1">Mail</button>
            <button type="submit" class="btn btn-primary btn-block btn-large" name="btn2">Authenticator</button>
            <button type="submit" class="btn btn-primary btn-block btn-large" name="btn3">Security Questions</button>
            <!-- <button type="submit" class="btn btn-primary btn-block btn-large">Log in</button>
            <button type="submit" class="btn btn-primary btn-block btn-large">Log in</button> -->
            </center>
        </div>
    </form>
</body>
</html>
<?php
    if(isset($_GET['id'])){
        echo "<p style='color:white;'>" . 'Welcome '.$_GET['id'].'!' . "</p>";
        }else {
        echo '(write) a 404 page';
    }
    if(isset($_POST["btn1"])){
        header("Location: ./success.html");
    }
    if(isset($_POST["btn2"])){
        header("Location: ./2fa_check.php");
    }
    if(isset($_POST["btn3"])){
        header("Location: ./success.html");
    }
?>