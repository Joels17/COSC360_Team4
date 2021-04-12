<?php

session_start();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    die("Incorrect request method");
};
include "database_connect.php";

$firstName = $_POST['fName'];
$lastName = $_POST['lName'];
$username = $_POST['uName'];
$email = $_POST['email'];
$password = $_POST['password'];

$sqlCheck = "SELECT username FROM users WHERE username = ? OR email = ?;";
$stmtCheck = mysqli_stmt_init($connection);
if(!mysqli_stmt_prepare($stmtCheck, $sqlCheck)){
    die("SQL statement failed");
}else{
    mysqli_stmt_bind_param($stmtCheck, "ss", $username, $email);
    mysqli_stmt_execute($stmtCheck);
    $resultsCheck = mysqli_stmt_get_result($stmtCheck);
    if(!empty(mysqli_fetch_assoc($resultsCheck))){
        die("User already exists with this name and/or email<br>");
    }
}

$image = addslashes(file_get_contents($_FILES['pp-upload']['tmp_name']));
$sql = "INSERT INTO users (username, firstName, lastName, email, password, img) VALUES (?,?,?,?,?,'$image');";
$stmt = mysqli_stmt_init($connection);
if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "SQL statement failed";
}else{
    $hashPass = md5($password);
    mysqli_stmt_bind_param($stmt, "sssss", $username, $firstName, $lastName, $email, $hashPass);
    mysqli_stmt_execute($stmt);
    echo "Success, the account '$username' has been created!";
    $_SESSION['user'] = $username;

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
        echo '<a href="../index.php">Home</a><img width=200 height=200 src="data:image/jpeg;base64,'.base64_encode( $result['img'] ).'"/>';
    }
}

mysqli_free_result($results);
mysqli_free_result($resultsCheck);
mysqli_close($connection);

?>