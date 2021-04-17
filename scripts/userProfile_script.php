


<?php
 session_start();

include "database_connect.php";

$userName =  $_SESSION['user'] ;

$nfName = $_POST["fName"];
$nlName = $_POST["lName"];
$nEmail = $_POST["email"];

$image=null;
if(isset($_POST["submit"])) {
$image = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
}



$currPass = md5($_POST["password"]);
$nPassword = md5($_POST["confirm-new-password"]);


$sql = "SELECT * FROM users WHERE username = '$userName' ;";
$results = mysqli_query($connection, $sql);

   



    if (mysqli_num_rows($results) > 0) {
        while($row = mysqli_fetch_assoc($results)) {
          
          $ffName = $row['firstName'];
          $llName = $row['lastName'];
          $eemail = $row['email'];
          $number = $row['number'];
          $ppassword = $row['password'];
          
        }
       
        }

       


if ($currPass == $ppassword){
  
    $sql2 = "UPDATE users
     SET firstName = \"$nfName\",lastName = \"$nlName\",email = \"$nEmail\",password = \"$nPassword\" ,img = \"$image\"
     WHERE username = \"$userName\"
     
     ;";
    $results2 = mysqli_query($connection, $sql2);
    echo "Updated !";
}
   


else {
    echo "<h1> Current Password is incorrect ! </h1>";
}

mysqli_close($connection);


?>