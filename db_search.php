<?php
    include "scripts/database_connect.php";
    if(ISSET($_GET['title'])){
        $title = mysqli_real_escape_string($connection,trim($_GET['title']));

        if(!is_null($title) && !empty($title)){

            $error = mysqli_connect_error();
            if($error != null){
                $output = "<p> Unable to connect to database";
                exit($output);
            }else{
                $sql = "SELECT * FROM users;";
                $stmtCode = mysqli_stmt_init($connection);
                if(!mysqli_stmt_prepare($stmtCode, $sql)){
                    echo "Title search failed";
                }else{
                    mysqli_stmt_bind_param($stmtCode, "s", $title);
                    mysqli_stmt_execute($stmtCode);
                    $resultsCode = mysqli_stmt_get_result($stmtCode);
                    while($row = mysqli_fetch_assoc($resultsCode)){
                        //place echo statements in here for displaying results
                        echo "<p>User: ".$row['username']."</p><br>";
                        echo "<p>First Name: ".$row['firstName']." Last Name: ".$row['lastName']."</p>";
                        echo "<hr>";
                    }
                    
                }
            }

            mysqli_free_results($resultsCode);
        }
    }
    if(ISSET($_GET['search'])){
        $search = mysqli_real_escape_string($connection,trim($_GET['search']));

        if(!is_null($search) && !empty($search)){
            $error = mysqli_connect_error();
            if($error != null){
                $output = "<p> Unable to Connect to Database </p>";
                exit($output);
            }else{
                $sql = "SELECT * FROM blogs WHERE title LIKE '%$search%';";
                $stmtCode = mysqli_stmt_init($connection);
                if(!mysqli_stmt_prepare($stmtCode,$sql)){
                    echo "Title search Failed";
                }else{
                    mysqli_stmt_bind_param($stmtCode,"s",$search);
                    mysqli_stmt_execute($stmtCode);
                    $resultsCode = mysqli_stmt_get_result($stmtCode);
                    while($row = mysqli_fetch_assoc($resultsCode)){
                        //Insert Code here to change how the results are displayed
                        echo "<p>Title: ".$row['title']."</p>";
                        echo "<hr>";
                    }
                }
            }
            mysqli_free_result($resultsCode);
        }
    }
    mysqli_close($connection);
?>