<?php
session_start();
if(isset($_POST['save']))
{
    $rno=$_SESSION['otp'];
    $urno=$_POST['otpvalue'];
    if(!strcmp($rno,$urno))
    {
        header("Location: ./success.html");
    } else { 
        header("Location: ./fail.html");
     }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>OTP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="login.css">
    </head>
<style>
a{
text-decoration:none;
}
</style>
<body>
<br>
<div class=login>
<h1>OTP</h1>
<br>
<form class="w3-container" method="post" action="">
<br>
<br>
<p><input class="w3-input w3-border w3-round" type="password" placeholder="OTP" name="otpvalue"></p>
<p class="w3-center"><button class="btn btn-primary btn-block btn-large" style="width:100%;height:40px" name="save">Submit</button></p>
</form>
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<br>
</div>
</body>
</html>