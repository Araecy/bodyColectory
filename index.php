<!-- Start a php session (this must be before <!DOCTYPE html>!!!) -->
<?php
    session_start();
    $_SESSION["previousPage"] = "";
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Body pillow collectors</title>
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/signupAndLoginStyle.css">
    </head>
    <body>
        <div id="backgroundWrapper"></div>
        <?php
            require_once("navbar.php");
            require_once("modals.php");
        ?>
    </body>
</html>