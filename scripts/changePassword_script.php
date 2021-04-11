<?php
    include "database_connect.php";

    $email = $_POST['email'];
    $userCode = $_POST['code'];
    $pass = $_POST['pass'];
    $passCon = $_POST['passCon'];

    if($pass != $passCon){
        die("Passwords do not match");
    }else{
        $sqlCode = "SELECT code FROM tempCode WHERE email = ?";
        $stmtCode = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmtCode, $sqlCode)){
            echo "SQL statement failed";
        }else{
            mysqli_stmt_bind_param($stmtCode, "s", $email);
            mysqli_stmt_execute($stmtCode);
            $resultsCode = mysqli_stmt_get_result($stmtCode);
            $results = mysqli_fetch_assoc($resultsCode);
            if(!empty($results)){
                if($userCode == $results['code']){
                    $sqlUpdate = "UPDATE users SET password = ? WHERE email = ?";
                    $stmtUpdate = mysqli_stmt_init($connection);
                    if(!mysqli_stmt_prepare($stmtUpdate, $sqlUpdate)){
                        echo "SQL statement failed";
                    }else{
                        $hashPass = md5($pass);
                        mysqli_stmt_bind_param($stmtUpdate, "ss", $hashPass, $email);
                        mysqli_stmt_execute($stmtUpdate);
                        echo "Password changed!";
                    }
                }else{
                    echo "Incorrect code";
                }
            }else{
                echo "Incorrect information";
            }
        }
    }
    mysqli_free_result($resultsCode);
    mysqli_close($connection);
?>