<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <title>Authy</title>
    <link rel="stylesheet" href="login.css">
</head>
<body style="color:white">
    <ol>
        <?php
            require __DIR__ . '/vendor/autoload.php';
            spl_autoload_register(function ($className) {
                include_once str_replace(array('RobThree\\Auth', '\\'), array(__DIR__.'/../lib', '/'), $className) . '.php';
            });
            // substitute your company or app name here
            $tfa = new RobThree\Auth\TwoFactorAuth('Test');
        ?>
        <li>First create a secret and associate it with a user</li>
        <?php
            $secret = $tfa->createSecret();
            //
            include("./database.php");
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE users SET secret = ? WHERE username= ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($secret,$_GET['id']));
            $_SESSION['user'] = $_GET['id'];
            //
        ?>
        <li>
            Next create a QR code and let the user scan it:<br>
            <img src="<?php echo $tfa->getQRCodeImageAsDataUri('Demo', $secret); ?>"><br>
            ...or display the secret to the user for manual entry:
            <?php echo chunk_split($secret, 4, ' '); ?>
        </li>
        <?php
            $code = $tfa->getCode($secret);
        ?>
        <li>Next, have the user verify the code; at this time the code displayed by a 2FA-app would be: <span style="color:blue"><?php echo $code; ?></span> (but that changes periodically)</li>
        <li>When the code checks out, 2FA can be / is enabled; store (encrypted?) secret with user and have the user verify a code each time a new session is started.</li>
        <li>
            When aforementioned code (<?php echo $code; ?>) was entered, the result would be:
            <?php if ($tfa->verifyCode($secret, $code) === true) { ?>
                <span style="color:#0c0">OK</span>
            <?php } else { ?>
                <span style="color:#c00">FAIL</span>
            <?php } ?>
        </li>
    </ol>
    <br><br>
    <a href="security.html" class="btn btn-primary btn-large" style="margin-left:1em;">Generate security questions</a>
</body>
</html>