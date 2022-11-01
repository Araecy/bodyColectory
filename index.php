<!-- Start a php session (this must be before <!DOCTYPE html>!!!) -->
<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Body pillow collectors</title>
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="css/signupAndLoginStyle.css">
    </head>
    <body>
        <div id="backgroundWrapper"></div>
        <div id="navWrapper">
            <nav>
                <li><a href="#">home</a></li>
                <li><a href="#">collection</a></li>

                <?php
                    $loggedIn = $_SESSION["loggedIn"];
                    $isAdmin = $_SESSION["isAdmin"];

                    // If logged in show upload button and username
                    if(isset($loggedIn) && !empty($loggedIn) && $loggedIn == 1){
                        $username = $_SESSION["username"];

                        echo
                            "<li><a href='#' onclick=\"document.getElementById('uploadForm').style.display='block'\">Upload</a></li>".
                            "<li class='usernameLi'><p class='usernameP'>". $username. "</p>"
                        ;
                        // If user is admin show admin in red after username
                        if(isset($isAdmin) && !empty($isAdmin) && $isAdmin == 1){
                            echo "<p class='adminP'>ADMIN</p>";
                        }
                        echo
                            "</li>".
                            "<li><a href='logout.php'>logout</a></li>"
                        ;
                    }
                    // If not logged in show signup button to open signup modal form
                    else{
                        echo "<li id='signUpLi'><a href='#' onclick=\"document.getElementById('id01').style.display='block'\">Sign Up</a></li>";
                    }
                ?>

                <?php
                    // If not logged in show login button to open login modal form
                    if(!isset($loggedIn)){
                        echo "<li><a href='#' onclick=\"document.getElementById('id02').style.display='block'\" class='loginButton'>Login</a></li>";
                    }
                ?>

                <div id="logoWrapper">
                    <img src="./img/logo.png" alt="logo" id="logo">
                </div>
            </nav>
        </div>

        <!-- Signup modal form -->
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content animate" action="signup.php" method="post">
                <div class="container">
                    <h1>Sign Up</h1>
                    <p>Please fill in this form to create an account.</p>
                    <hr>
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Username" name="username" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="passwordRepeated" required>

                    <label>
                        <input type="checkbox" checked="checked" name="rememberMe" style="margin-bottom:15px"> Remember me
                    </label>

                    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Login modal form -->
        <div id="id02" class="modal2">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content2 animate" action="login.php" method="post">
                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" class="loginInput" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" class="loginInput" required>

                    <button type="submit" class="loginButton">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="rememberMe" class="loginInput"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#1e1e1e">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn2 loginButton">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>

        <!-- Upload modal form -->
        <div id="uploadForm" class="modal2">
            <span onclick="document.getElementById('uploadForm').style.display='none'" class="close" title="Close Modal">&times;</span>

            <!-- Modal Content -->
            <form class="modal-content2 animate" action="upload.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <label for="characterName"><b>Character name</b></label>
                    <input type="text" placeholder="Character name" name="characterName" required>

                    <label for="series"><b>Series</b></label>
                    <input type="text" placeholder="Series" name="series" required>

                    <label for="artist"><b>Artist</b></label>
                    <input type="text" placeholder="Artist" name="artist" required>

                    <label for="size"><b>Size</b></label>
                    <input type="text" placeholder="Size" name="size" required>

                    <label for="material"><b>Material</b></label>
                    <input type="text" placeholder="Material" name="material" required>

                    <label for="image"><b>Image</b></label>
                    <input type="file" placeholder="Choose image" name="image" required>

                    <button type="submit">Upload</button>
                </div>

                <div class="container" style="background-color:#1e1e1e">
                    <button type="button" onclick="document.getElementById('uploadForm').style.display='none'" class="cancelbtn2 loginButton">Cancel</button>
                </div>
            </form>
        </div>

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
                                "<p>Material: ". $row['material']. "</p>".
                            "</div>"
                        ;
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

        <!-- JS Scripts -->
        <script src="js/signupAndLoginScript.js"></script>
    </body>
</html>