

<head>
<title>Login</title>

<h1>Our Blog Site</h1>

<link rel= "stylesheet" href="styles.css">

</head>
<body>
<div class = "form-master">
   <form action="./scripts/login_script.php" method="POST">


    <div class= "email-form">
    <input  type="text" name="e-mail" required>
    <label for="e-mail" class ="e-label"><span class = "email-content">E-mail</span></label>
    </div>
    <div class ="spacing"></div>
    <div class= "password-form">
    <input type="password" name="pass" required>
    <label for="pass"><span class = "password-content">Password</span></label>
    </div>
   <button type = "submit" class = "submit"> <span class="button-content"> Log In </span>
    </button>
   
    <div class="links">
   <a href="recovery.php" class ="reset"> <p>Forgot password ?</p></a>
   <a href="register.php" class ="register"> <p>New User?</p></a>
   </div> 
</form>
</div>
</body>