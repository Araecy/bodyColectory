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
        <title>Logging out...</title>
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/signupAndLoginStyle.css">
    </head>
    <body>
    </body>
</html>


<?php
    // Logout
    session_destroy();
    // Redirect automatically to index.php
    header('Location: ./');
    exit;
?>