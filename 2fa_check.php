<?php
            require __DIR__ . '/vendor/autoload.php';
            spl_autoload_register(function ($className) {
                include_once str_replace(array('RobThree\\Auth', '\\'), array(__DIR__.'/../lib', '/'), $className) . '.php';
            });
            // substitute your company or app name here
            $tfa = new RobThree\Auth\TwoFactorAuth('Test');
            if(isset($_POST["verification"]))
            {
                $secret = "INSERT_SECRET_KEY";
                if ($tfa->verifyCode($secret, $_POST["verification"]) === true) {
                    header("Location: ./success.html");
                } else { ?>
                    <span style="color:#c00">FAIL</span>
                <?php }
            }
?>