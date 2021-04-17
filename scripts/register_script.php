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
$sql = "INSERT INTO users (username, firstName, lastName, email, password, img, disabled, admin) VALUES (?,?,?,?,?,'$image',?,?);";
$stmt = mysqli_stmt_init($connection);
if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "SQL statement failed";
}else{
    $hashPass = md5($password);
    $disabled = 0;
    $admin = 0;
    mysqli_stmt_bind_param($stmt, "sssssbb", $username, $firstName, $lastName, $email, $hashPass, $disabled, $admin);
    mysqli_stmt_execute($stmt);
    echo "Success, the account '$username' has been created!";
    $_SESSION['user'] = $username;
    header("Location: ../index.php"); 
}

mysqli_free_result($results);
mysqli_free_result($resultsCheck);
mysqli_close($connection);

?>