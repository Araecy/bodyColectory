<div id="navWrapper">
    <nav>
        <li><a href="./">home</a></li>
        <li><a href="collection.php">collection</a></li>

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
            <img src="img/logo.png" alt="logo" id="logo">
        </div>
    </nav>
</div>