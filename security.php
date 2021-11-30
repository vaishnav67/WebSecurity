<?php
session_start();
if(isset($_POST["q1"]) && isset ($_POST["q2"]) && isset($_POST["q3"]) && isset($_POST["q4"])){
    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];
    $q3 = $_POST["q3"];
    $q4 = $_POST["q4"];
    include("./database.php");
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `questions`(`q1`, `q2`, `q3`,`q4`,`username`) VALUES (?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($q1,$q2,$q3,$q4,$_SESSION['user']));
    header("Location: ./login.html");
}
?>