<?php
    session_start();
    date_default_timezone_set('America/Vancouver');
    if(!isset($_SESSION['user'])){
        die("Please login");
    }

    include "database_connect.php";
    $commentBody = $_POST['commentBody'];
    $blogId = $_GET['blogId'];
    $sqlAddComment = "INSERT INTO comments (commentBody, datetime, uploadUser, uploadBlog) VALUES (?,?,?,?);";
    $stmtAddComment = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmtAddComment, $sqlAddComment)){
        echo "SQL statement failed";
    }else{
        $date = date('Y-m-d H:i:s');
        $user = $_SESSION['user'];
        mysqli_stmt_bind_param($stmtAddComment, "sssi", $commentBody, $date, $user, $blogId);
        mysqli_stmt_execute($stmtAddComment);
       header("Location: ../blogPage.php?blogId=".$blogId);
    }
?>