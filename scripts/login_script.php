<?php

session_start();

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    die("Incorrect request method");
};

include "database_connect.php";

$email = $_POST['e-mail'];
$password = $_POST['pass'];

$sqlCheck = "SELECT username FROM users WHERE email = ? AND password = ?;";
$stmtCheck = mysqli_stmt_init($connection);
if(!mysqli_stmt_prepare($stmtCheck, $sqlCheck)){
    echo "SQL statement failed";
}else{
    $hashPass = md5($password);
    mysqli_stmt_bind_param($stmtCheck, "ss", $email, $hashPass);
    mysqli_stmt_execute($stmtCheck);
    $resultsCheck = mysqli_stmt_get_result($stmtCheck);
    $results = mysqli_fetch_assoc($resultsCheck);
    if(!empty($results)){
        $_SESSION['user'] = $results['username'];
        header("Location: ../index.php"); 
    }else{
        echo "Incorrect email/password";
    }
}

mysqli_free_result($resultsCheck);
mysqli_close($connection);

?>