

<?php
 //session_start();

include "./scripts/database_connect.php";
session_start();
$username =  $_SESSION['user'] ;

$sql = "SELECT * FROM users WHERE username = ?;";
$stmtCheck = mysqli_stmt_init($connection);
if(!mysqli_stmt_prepare($stmtCheck, $sql)){
	echo "SQL statement failed";
	exit();
}
	
	mysqli_stmt_bind_param($stmtCheck, "s", $username);
	mysqli_stmt_execute($stmtCheck);
	$results = mysqli_stmt_get_result($stmtCheck);
    if (mysqli_num_rows($results) > 0) {
        while($row = mysqli_fetch_assoc($results)) {
          
            $ffName = $row['firstName'];
            $llName = $row['lastName'];
            $eemail = $row['email'];
            $ppassword = $row['password'];
            $profilePicture = $row['img'];
		}
    }
mysqli_close($connection);

if(isset($_SESSION['user'])){

?>



<head>
<title>Profile</title>
<link rel= "stylesheet" href="userProfile.css">
<!-- <script defer type="text/JavaScript" src="scripts/index.js"></script> -->
<script  type="text/JavaScript" src="scripts/validateUser.js"></script>
</head>


<body>

<?php
        //include "header.php";
    ?>
<script type="text/javascript">
function checkPasswordMatch(e){  
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("password-check").value;

  if(password != confirmPassword){
    alert("Passwords are not equal")
    e.preventDefault();
  }
}
</script>


<div id="heading">
  <!-- <form action="./scripts/upload.php" method = "POST" id = "heading-form" enctype="multipart/form-data">
<input type="file" name="fileToUpload" id="fileToUpload">
<input action type="submit" value="Change Profile Picture" name="submit">
</form> -->
	<?php   echo '<img src="data:image/jpeg;base64,'. base64_encode($profilePicture) .'" width=90 height=90/>';
	?>
	<div id="username-container">
		<span id = "username">
			<?php echo "<h1>User: $username </h1>" ?>
		</span>
	</div>
</div>


<button action = "./scripts/userProfile_script.php" id ="edit">Edit Info</button>

    <form  action="./scripts/userProfile_script.php" method = "POST" enctype="multipart/form-data" id = "form-master" >
   
    
    <div class ="fName">
    <input type="text" name = "fName" class="required" value = "<?php echo $ffName ?>" required >
    <label for="lName" class="fName-label"><span class = "content">First Name:</span> </label>
    </div>
    <div class="spacer"></div>

    <div class ="lName">
    <input  type="text" name = "lName" class="required" value = "<?php echo $llName ?>" required >
    <label for="lName" class="lName-label"><span class = "content">Last Name:</span> </label>
    </div>
    <div class="spacer"></div>
    <div class ="email">
    <input type="text" name = "email" class="required"value = "<?php echo $eemail ?>" required >
    <label for="email" class="email-label"><span class = "content">Email:</span> </label>
    </div>


    <div class="spacer"></div>
    
    <div class ="password">
    <input  type="password" name = "password" class="required" required >
    <label for="password" class="password-label"><span class = "content">Current Password:</span> </label>
    <input name = "showPass" type="checkbox">
    <span>Show Password?</span>
    </div>
    
    <div class="spacer"></div>

    <div class ="new-password">
    <input id = "password" type="password" name = "new-password" class="required" required >
    <label for="new-password" class="new-password-label"><span class = "content">New Password:</span> </label>
    <input name = "showPass" type="checkbox">
    <span>Show Password?</span>
    </div>
    <div class="spacer"></div>


    <div class ="confirm-new-password">
    <input id = "password-check" type="password" name = "confirm-new-password" class="required" required >
    <label for="new-password" class="confirm-new-password-label"><span class = "content">Confirm Password:</span> </label>
    <input name = "showPass" type="checkbox">
    <span>Show Password?</span>
    </div>

    <div class="spacer"></div>


  
    <input id = "submitButton" type="submit">
    
    
    </form>
</body>


<?php }
                    
else {
    die("You can't enter this page without logging in first");
}                    
                    
                    
                    
?>

