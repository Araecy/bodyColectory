<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signing up...</title>
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

    // Taking all values from the form data(input)
    $formUsername         = $_REQUEST['username'];
    $formPassword         = $_REQUEST['password'];
    $formPasswordRepeated = $_REQUEST['passwordRepeated'];
    $formRememberMe       = $_REQUEST['rememberMe'];


    if($formPassword == $formPasswordRepeated){
        // Check if username already exists
        $query  = "SELECT * FROM users WHERE username = '$formUsername'";
        $result = mysqli_query($dbConn, $query);

        // If username doesn't exist already proceed with account creation
        if(mysqli_num_rows($result) == 0){
            $formPasswordHashed = password_hash($formPassword, PASSWORD_DEFAULT);
            $query2             = "INSERT INTO users (username, password) VALUES ('$formUsername', '$formPasswordHashed')";

            // Insert data in users table in beroeps2Verzamelaar database
            mysqli_query($dbConn, $query2);

            echo
                "<div id='content'>",
                    "<h1>Account successfully created!</h1>",
                    "<a href='./'>Continue</a>",
                "</div>"
            ;
            // Redirect automatically to index.php after 2 seconds
            header("Refresh: 2; url = ./");
        }
        // If username already exists show error
        else{
            echo
                "<div id='content'>",
                    "<h1>That username has already been taken!</h1>",
                    "<a href='./'>Continue</a>",
                "</div>"
            ;
            // Redirect automatically to index.php after 2 seconds
            header("Refresh: 2; url = ./");
        }
    }
    // If passwords don't match show error
    else{
        echo
            "<div id='content'>",
                "<h1>passwords don't match!</h1>",
                "<a href='./'>Continue</a>",
            "</div>"
        ;
        // Redirect automatically to index.php after 2 seconds
        header("Refresh: 2; url = ./");
    }
    // DEBUG:  or die(mysqli_error($dbConn))
?>