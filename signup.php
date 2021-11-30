<?php
session_start();
if(isset($_POST["username"]) && isset ($_POST["password"]) && isset($_POST["email"])){
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$hash_variable_salt = password_hash($password,PASSWORD_DEFAULT, array('saltsaltsaltsalt' => 9));
include("./database.php");
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO `users`(`username`, `password`, `email`) VALUES (:username,:password,:email)";
$q = $pdo->prepare($sql);
$q->bindParam(':username', $username, PDO::PARAM_STR);
$q->bindParam(':password', $hash_variable_salt, PDO::PARAM_STR);
$q->bindParam(':email', $email, PDO::PARAM_STR);
$q->execute();
header("Location: ./2fa_create.php?id=$username");
$total = $q-> rowCount();
}
?>