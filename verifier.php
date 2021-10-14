<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
    <style>
        input{
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <fieldset style="width: 45em; color: white; margin: 20px; padding: 30px;">
        <legend style="background-color: #2653ac;">Security Questions</legend>
        <form method="POST" action="#">
            <br>
            In what city were you born?<br>
            <input type="text" name="q1" required="required" style="width: 30em;"><br><br>
            What is the name of your favorite pet?<br>
            <input type="text" name="q2" required="required" style="width: 30em;"><br><br>
            What was the make of your first car?<br>
            <input type="text" name="q3" required="required" style="width: 30em;"><br><br>
            What was your favorite food as a child?<br>
            <input type="text" name="q4" required="required" style="width: 30em;"><br><br>
            <button type="submit" name="submitbtn" class="btn btn-primary btn-block btn-large" style="width: 20em;">Submit</button>
        </form>
    </fieldset>
</body>
</html>
<?php
    if(isset($_GET['id'])){
        echo 'Welcome '.$_GET['id'];
        }else {
        echo '(write) a 404 page';
    }
    if(isset($_POST["submitbtn"])){
    include("./database.php");
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM questions WHERE username= :username";
    $q = $pdo->prepare($sql);
    $q->bindParam(':username', $_GET['id'], PDO::PARAM_STR);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    if($_POST['q1']==$data['q1'] && $_POST['q2']==$data['q2'] && $_POST['q3']==$data['q3'] && $_POST['q4']==$data['q4']){
        echo "Success";
    }
}
?>