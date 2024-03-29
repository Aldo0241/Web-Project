<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
    <link rel="stylesheet" href="prj_login.css" type="text/css" />
    <script src="prj_login.js" type="text/javascript">  </script>
    <meta charset="UTF-8" />
    <meta title="Login" />
    <meta name="description" content="loginPage " />
    <meta name="keywords" content="login" />
    <meta author="Gruppo 27" />
    <meta keyword ="login" />
    <link rel="icon" type="image/x-icon" href="../Images/imgHome/trainIcon.png">
    <title>Login</title>
    <?php require('prj_authFunctions.php'); ?>
</head>

<body>
    <?php session_start(); ?>
    <div class="mainContainer" id="main">

        <div class="title">
            <a href="../Home/prj_home.php">
                <h1>TRAIN TRAVEL ADVISOR</h1>
            </a>
        </div>

        <div class="containerLogin" id="container">
            <form name="loginForm" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"
                onsubmit="return validateFormLogin()">
                <h1>Login</h1>
                <input type="text" id="usernameLogin" name="usernameLogin" placeholder="Username" <?php if (array_key_exists('usernameLogin', $_POST)) {
                    echo "value='", htmlspecialchars($_POST['usernameLogin']), "'";
                } ?> />
                <input type="password" id="passwordLogin" name="passwordLogin" placeholder="Password" <?php if (array_key_exists('passwordLogin', $_POST)) {
                    echo "value='", htmlspecialchars($_POST['passwordLogin']), "'";
                } ?> />
                <span id="loginErrorSpan"></span>
                <button type="submit" name="loginBtn">ACCEDI</button>
                <p id="switchLogin"> Non hai ancora un account?<button type="button" id="switchBtn"
                        onclick="window.location.href = 'prj_signup.php';">Registrati</button> </p>
            </form>
        </div>

    </div>

    <?php require("../Home/prj_footer.php"); ?>


    <?php
    $usernameLogin = null;
    $passwordLogin = null;

    if (!empty($_POST)) {
        $usernameLogin = $_POST['usernameLogin'];
        $passwordLogin = $_POST['passwordLogin'];
        $hash = get_pwd($usernameLogin);

        if (!usernameExists($usernameLogin)) {
            echo (" <script LANGUAGE='JavaScript'>  
                                let message = document.getElementById('loginErrorSpan');
                                message.innerHTML = '$usernameLogin non risulta registrato';
                                </script>");
        } else if (password_verify($passwordLogin, $hash)) {
            $_SESSION['username'] = $usernameLogin;
            $_SESSION['authorized'] = true;
            echo ("<script LANGUAGE='JavaScript'>
                                window.location.href = '../Home/prj_home.php';
                                </script>");
        } else {
            echo (" <script LANGUAGE='JavaScript'>
                                let message = document.getElementById('loginErrorSpan');
                                message.innerHTML = 'Password errata. Riprovare';
                                </script>");
        }
    }
    ?>





</body>

</html>