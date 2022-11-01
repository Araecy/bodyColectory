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
        <title>Uploading...</title>
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

    // Taking all values from the form data(input) and session
    $uploader      = $_SESSION['username'];
    $uploaderId    = $_SESSION['id'];
    $characterName = $_REQUEST['characterName'];
    $series        = $_REQUEST['series'];
    $artist        = $_REQUEST['artist'];
    $size          = $_REQUEST['size'];
    $material      = $_REQUEST['material'];
    $filename      = $_FILES['image']['name'];

    // Make directory for user named after the users id
    mkdir('uploadedImages/'. $_SESSION['id']);

    // Move uploaded file to uploadedImages/{id}
	move_uploaded_file($_FILES["image"]["tmp_name"], 'uploadedImages/'. $_SESSION['id']. '/'. $filename);

    $query  = "INSERT INTO bodyPillows (uploader, uploaderId, characterName, series, artist, size, material, filename) VALUES ('$uploader', '$uploaderId', '$characterName', '$series', '$artist', '$size', '$material', '$filename')";

    // Insert data in bodyPillows table in beroeps2Verzamelaar database
    mysqli_query($dbConn, $query);
    echo
        "<div id='content'>",
            "<h1>Succesfully uploaded!</h1>",
            "<a href='./". $_SESSION['previousPage']. "'>Continue</a>",
        "</div>"
    ;
    // Redirect automatically to the previous page after 2 seconds
    header("Refresh: 2; url = ./". $_SESSION['previousPage']);
?>