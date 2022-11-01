<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Removing item...</title>
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/signupAndLoginStyle.css">
    </head>
    <body>
    </body>
</html>


<?php
    $host     = "localhost";
    $username = "toor";
    $password = "rjh^2C$^r\$P!L&Pj&58Edxy3zgsgn6Bvb24%VnY\$xXwr7pxMY3bnKZ5qfH%ULUb&6s!p^t\$fzzk@Tjier7iBcCJxp2xYvM3pf$%G%9Y%wt3t6rRUb#Qi2n\$WVwH!gYG!";
    $database = "beroepsVerzamelaars";

    $dbConn   = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if(!$dbConn){
        die("ERROR: Could not connect. ". mysqli_connect_error());
    }

    $itemId     = $_REQUEST['itemId'];
    $uploaderId = $_REQUEST['uploaderId'];
    $filename   = $_REQUEST['filename'];

    $query      = "DELETE FROM bodyPillows WHERE id = '$itemId'";

    // Delete item from database
    mysqli_query($dbConn, $query);
    // Delete image from server
    unlink("uploadedImages/$uploaderId/$filename");

    echo
        "<div id='content'>",
            "<h1>Item removed!</h1>",
            "<a href='./'>Continue</a>",
        "</div>"
    ;
    // Redirect automatically to index.php
    header('Location: ./');
?>