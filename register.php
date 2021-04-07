<head>
    <title>Registration Page</title>
    <link rel= "stylesheet" href="register.css">
    <script defer type="text/JavaScript" src="scripts/index.js"></script>
</head>
<body>
    <div class="form-master">
    <form action="./scripts/register_script.php" method="POST" enctype="multipart/form-data">


    <div class ="pp">
    <input type="file" name = "pp-upload" id="file">
    <label for="pp-upload" class="pp-label"> <span class = "pp-content">Upload a profile picture: </span>  </label>
    </div>

    <div class="spacer"></div>

    <div class ="fName">
    <input placeholder = "                  Enter your first name" type="text" name = "fName" required >
    <label for="fName" class="fName-label"><span class = "content">First Name:</span> </label>
    </div>

    <div class="spacer"></div>

    <div class ="lName">
    <input placeholder = "                  Enter your family name" type="text" name = "lName" required>
    <label for="lName" class="lName-label"><span class = "content">Last Name:</span> </label>
    </div>

    <div class="spacer"></div>

    <div class ="uName">
    <input placeholder = "                  Enter a username" type="text" name = "uName" required>
    <label for="uName" class="uName-label"><span class = "content">Username:</span> </label>
    </div>

    <div class="spacer"></div>

    <div class ="email">
    <input placeholder = "                  Enter your e-mail" type="text" name = "email" required>
    <label for="email" class="email-label"><span class = "content">E-mail:</span> </label>
    </div>

    <div class="spacer"></div>

    <div class ="password">
    <input placeholder = "                        Choose a password" type="password" name = "password" required>
    <label for="password" class="password-label"><span class = "content">New Password: </span> </label>
    </div>

    <div class="spacer"></div>
    <div class ="confirm-password">
    <input placeholder = "                             Confirm you password" type="password" name = "confirm-password" required>
    <label for="confirm-password" class="password-label"><span class = "content">Confirm Password:</span> </label>
    </div>

    <div class="spacer"></div>
    
    </div>

    <div class = "links">
    <a href="login.php"><button class ="cancel">Cancel</button>
    </a>
    <button type ="submit" class="register">Register</button>
    </form>
    </div>
</body>