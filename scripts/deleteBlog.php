<?php
    include "database_connect.php";
    $id = $_GET['blogId'];
    $sqlCheck = "DELETE FROM blogs WHERE id = ?;";
    $stmtCheck = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmtCheck, $sqlCheck)){
        echo "SQL statement failed";
    }else{
        $hashPass = md5($password);
        mysqli_stmt_bind_param($stmtCheck, "i", $id);
        mysqli_stmt_execute($stmtCheck);
        header("Location: ../index.php"); 
    }
?>