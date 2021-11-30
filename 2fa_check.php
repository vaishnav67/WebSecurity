<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
spl_autoload_register(function ($className)
{
    include_once str_replace(array('RobThree\\Auth', '\\'), array(__DIR__.'/../lib', '/'), $className) . '.php';
});
$tfa = new RobThree\Auth\TwoFactorAuth('Test');
if(isset($_POST["verification"]))
{
    include("./database.php");
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT secret FROM users WHERE username= :username";
    $q = $pdo->prepare($sql);
    $q->bindParam(':username', $_SESSION['user'], PDO::PARAM_STR);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    if ($tfa->verifyCode($data['secret'], $_POST["verification"]) === true) 
    {
        header("Location: ./success.html");
    }
    else
    { 
        header("Location: ./fail.html");
    }
}
?>