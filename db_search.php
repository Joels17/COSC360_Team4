<?php
    include "database_connect.php";
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
                if(!mysqli_stmt_prepare($stmtCode, $sqlCode)){
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

            mysqli_free_results($results);
        }
    }
    mysqli_close($connection);
?>