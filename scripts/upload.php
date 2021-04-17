<?php 

session_start();
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    die("Incorrect request method");
};
include "database_connect.php";

$userName =  $_SESSION['user'] ;


$image = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
$sql = "UPDATE users SET img = '$image'";
$stmt = mysqli_stmt_init($connection);
if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "SQL statement failed";
}else{

    mysqli_stmt_execute($stmt);
    echo "Success";
   

    // This part is just to show how to find and display the image
    $sql1 = "SELECT * FROM users WHERE username = ?";
    $stmt1 = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt1, $sql1)){
        echo "SQL statement failed";
    }else{
        mysqli_stmt_bind_param($stmt1, "s", $username);
        mysqli_stmt_execute($stmt1);
        $results = mysqli_stmt_get_result($stmt1);
        $result = mysqli_fetch_assoc($results);
        
    }
}

mysqli_free_result($results);
mysqli_close($connection);


?>