<head>
    <title>Recovery Page</title>
    <link rel= "stylesheet" href="recovery.css">
</head>
<body>
<?php
   include "header.php";
?>
    <p>Enter your email and we'll send you a recovery code if you have an account with us !</p>
    <form action="./scripts/recovery_script.php" class="form-master" method="POST">
    <div class = "email-recovery-form" >
    <input  type="text" name="e-mail" required>
    <label for="e-mail" class ="e-label"><span class = "email-content">E-mail</span></label>
    </div>
    
    <button type = "submit" class = "submit"> <span class="button-content"> Send Code </span>
    </form>
</body>