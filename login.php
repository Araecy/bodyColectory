<!-- Start a php session (this must be before <!DOCTYPE html>!!!): -->
<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logging in...</title>
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
    $formUsername   = $_REQUEST['username'];
    $formPassword   = $_REQUEST['password'];
    $formRememberMe = $_REQUEST['rememberMe'];

    $query          = "SELECT * FROM users WHERE username = '$formUsername'";
    $result         = mysqli_query($dbConn, $query);

    // Fetch all data from entered username from users table from beroeps2Verzamelaar database
    $row        = mysqli_fetch_array($result, MYSQLI_BOTH);

    $dbPassword = $row['password'];
    $isAdmin    = $row['isAdmin'];
    $id         = $row['id'];

    // Check if given username with given password exists and if password matches password in database
    if(password_verify($formPassword, $dbPassword)){
        // Add session variables
        $_SESSION["loggedIn"] = 1;
        $_SESSION["username"] = $formUsername;
        $_SESSION["isAdmin"]  = $isAdmin;
        $_SESSION["id"]       = $id;

        // Redirect automatically to the previous page
        header("Location: ./". $_SESSION['previousPage']);
    }
    else{
        // If given username with given password doesn't exist or passwords don't match show error
        echo
        "<div id='content'>",
            "<h1>Account with that username and password does not exist!</h1>",
            "<a href='./". $_SESSION['previousPage']. "'>Continue</a>",
        "</div>"
        ;
        // Redirect automatically to the previous page after 2 seconds
        header("Refresh: 2; url = ./". $_SESSION['previousPage']);
    }
    // DEBUG:  or die(mysqli_error($dbConn))
?>