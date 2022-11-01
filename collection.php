<!-- Start a php session (this must be before <!DOCTYPE html>!!!): -->
<?php
    session_start();
    $_SESSION["previousPage"] = "collection.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Body pillow collectors | Collection</title>
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

        <!-- Content -->
        <div id="contentDiv">
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

                $query  = "SELECT * FROM bodyPillows";
                $result = mysqli_query($dbConn, $query);

                // Add each uploaded item to home page
                if($_SESSION['isAdmin'] == 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo
                            "<div class='itemDiv'>".
                                "<img src='uploadedImages/". $row['uploaderId']. "/". $row['filename']. "'>".
                                "<p>Uploader: ". $row['uploader']. "</p>".
                                "<p>Character name: ". $row['characterName']. "</p>".
                                "<p>Series: ". $row['series']. "</p>".
                                "<p>Artist: ". $row['artist']. "</p>".
                                "<p>Size: ". $row['size']. "</p>".
                                "<p>Material: ". $row['material']. "</p>"
                        ;
                        if($row['uploaderId'] == $_SESSION['id']){
                            echo
                                "<form action='remove.php' method='post'>".
                                    "<input type='hidden' name='itemId' value='". $row['id']. "'>".
                                    "<input type='hidden' name='uploaderId' value='". $row['uploaderId']. "'>".
                                    "<input type='hidden' name='filename' value='". $row['filename']. "'>".
                                    "<button type='submit'>REMOVE</button>".
                                "</form>"
                            ;
                        }
                        echo "</div>";
                    }
                }
                if($_SESSION['isAdmin'] == 1){
                    while($row = mysqli_fetch_assoc($result)){
                        echo
                            "<div class='itemDiv'>".
                                "<img src='uploadedImages/". $row['uploaderId']. "/". $row['filename']. "'>".
                                "<p style='display:inline-block;'>Uploader: ". $row['uploader']. "</p>". "<p style='display:inline-block;color:orange;'> | ID: ". $row['uploaderId']. "</p>".
                                "<p>Character name: ". $row['characterName']. "</p>".
                                "<p>Series: ". $row['series']. "</p>".
                                "<p>Artist: ". $row['artist']. "</p>".
                                "<p>Size: ". $row['size']. "</p>".
                                "<p>Material: ". $row['material']. "</p>".
                                "<p style='color:orange;'>ID: ". $row['id']. "</p>".
                                "<p style='color:orange;'>Filename: ". $row['filename']. "</p>".
                                "<form action='remove.php' method='post'>".
                                    "<input type='hidden' name='itemId' value='". $row['id']. "'>".
                                    "<input type='hidden' name='uploaderId' value='". $row['uploaderId']. "'>".
                                    "<input type='hidden' name='filename' value='". $row['filename']. "'>".
                                    "<button type='submit'>REMOVE</button>".
                                "</form>".
                            "</div>"
                        ;
                    }
                }
            ?>
        </div>
    </body>
</html>