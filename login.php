<?php
session_start();
if(isset($_POST["username"]) && isset ($_POST["password"]) ){
$username = $_POST["username"];
$password = $_POST["password"];
$hash_variable_salt = password_hash($password,PASSWORD_DEFAULT, array('saltsaltsaltsalt' => 9));
include("./database.php");
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT password FROM users WHERE username='$username'";
$q = $pdo->prepare($sql);
$q->execute();

$total = $q-> rowCount();
if ($total)
{
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $check=password_verify($password,$data['password']);
    if($check == true)
    {
        $_SESSION['user'] = $_POST["username"];
        header("Location: ./selector.php?id=$username");
    }
    else
    { 
        echo '<span style="font-size:20px; font-weight:600; color:#D11111">Incorrect username or password</span>';
    }
}
else
{ 
    echo '<span style="font-size:20px; font-weight:600; color:#D11111">Incorrect username or password</span>';
}
}
?>