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

<!-- JS Scripts -->
<script src="js/signupAndLoginScript.js"></script>