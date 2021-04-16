<head>
    <title>Recovery Page</title>
    <link rel= "stylesheet" href="passwordCode.css">
</head>
<body>
<?php
   include "header.php";
?>
    <?php
        include "./scripts/database_connect.php";
        $email = $_GET['email'];
        
        $sqlCode = "SELECT code FROM tempCode WHERE email = ?";
        $stmtCode = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmtCode, $sqlCode)){
            echo "SQL statement failed";
        }else{
            mysqli_stmt_bind_param($stmtCode, "s", $email);
            mysqli_stmt_execute($stmtCode);
            $resultsCode = mysqli_stmt_get_result($stmtCode);
            $results = mysqli_fetch_assoc($resultsCode);
            if(!empty($results)){
                ?>
                <h2 id="passCode-title">Enter the code from your email and change your password</h2>
                <form id="passCode-form" action="./scripts/changePassword_script.php" class="form-master" method="POST">
                    <div id="passCode-div">
                    <label for="email" class ="e-label"><span class = "email-content">Email</span></label>
                    <input  type="text" name="email" value="<?php echo $email ?> " required>
                    <label for="code" class ="e-label"><span class = "email-content">Code</span></label>
                    <input  type="text" name="code" required>
                    <label for="pass" class ="e-label"><span class = "email-content">New Password</span></label>
                    <input  type="password" name="pass" required>
                    <label for="passCon" class ="e-label"><span class = "email-content">Confirm Password</span></label>
                    <input  type="password" name="passCon" required>
                    
                    
                    <button type = "submit" class = "submit"> <span class="button-content"> Change Password </span>
                    </div>
                </form>
                <?php
            }else{
                echo "Incorrect information";
            }
        }

        mysqli_free_result($resultsCode);
        mysqli_close($connection);
    ?>

</body>