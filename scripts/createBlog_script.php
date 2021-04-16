<?php
    include "database_connect.php";

    session_start();
    if(!isset($_SESSION['user'])){
        die("Not logged in");
    }

    $title = $_POST['blogTitle'];
    $body = $_POST['blogBody'];

    $sql = "INSERT INTO blogs (title, body, datetime, views, uploadUser) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statement failed";
    }else{
        $date = date('Y-m-d H:i:s');
        $views = 0;
        $user = $_SESSION['user'];
        mysqli_stmt_bind_param($stmt, "sssis", $title, $body, $date, $views, $user);
        mysqli_stmt_execute($stmt);
        echo "Success!";
    }
    mysqli_close($connection);
?>