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
        <!-- Background -->
        <div id="backgroundWrapper"></div>

        <!-- Navbar and modals -->
        <?php
            require_once("navbar.php");
            require_once("modals.php");
        ?>

        <!-- Text -->
        <div id="textDiv">
            <h1>body pillow collectors</h1>
            <p>
                Welcome to body&nbsp;pillow&nbsp;collectors, this website is made to
                store body pillows in the cloud so you can always access them. On the website
                you can see pillow covers that people have uploaded themselves and you can too!
                this is very easy, because special pages have been created where you only have
                to fill out an input list. this entry list consists of a few things: an image,
                character&nbsp;name, series, size, material, and&nbsp;the&nbsp;author. After you've
                done that you can go to the overview page to see your list and you can also see
                other people's pillows. And finally, you can also change things in the lists if
                something is wrong in it. then you can click on edit and you get the same list
                from the input page only then there is already data in it, and when you are
                done editing things, you can press submit and the list is updated.
            </p>
        </div>
    </body>
</html>