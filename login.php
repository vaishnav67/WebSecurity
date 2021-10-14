<?php
if(isset($_POST["username"]) && isset ($_POST["password"]) ){
$username = $_POST["username"];
$password = $_POST["password"];

include("./database.php");
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM users WHERE username= :username AND password= :password";
$q = $pdo->prepare($sql);
$q->bindParam(':username', $username, PDO::PARAM_STR);
$q->bindParam(':password', $password, PDO::PARAM_STR);
$q->execute();

$total = $q-> rowCount();

if ($total)
{
    $_SESSION['user'] = true;
	header("Location: ./authentication.php");
}
else
{ 
    echo '<span style="font-size:20px; font-weight:600; color:#D11111">Incorrect username or password</span>';
}
}
?>