<?php
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        die("Incorrect request method");
    };

    function rand_string( $length ) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    
    }

    include "database_connect.php";
    require_once('../PHPMailer/PHPMailerAutoload.php');
    $email = $_POST['e-mail'];

    $sqlCheck = "SELECT username, password FROM users WHERE email = ?";
    $stmtCheck = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmtCheck, $sqlCheck)){
        echo "SQL statement failed";
    }else{
        mysqli_stmt_bind_param($stmtCheck, "s", $email);
        mysqli_stmt_execute($stmtCheck);
        $resultsCheck = mysqli_stmt_get_result($stmtCheck);
        $results = mysqli_fetch_assoc($resultsCheck);
        if(!empty($results)){
            $code = rand_string(10);

            $sqlCode = "UPDATE tempCode SET email = ?, code = ?";
            $stmtCode = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmtCode, $sqlCode)){
                echo "SQL statement failed";
            }else{
                mysqli_stmt_bind_param($stmtCode, "ss", $email,$code);
                mysqli_stmt_execute($stmtCode);
            }
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '465';
            $mail->isHTML();
            $mail->Username = 'cosc360team4@gmail.com';
            $mail->Password = 'cosc360!';
            $mail->SetFrom('no-reply@team4.com');
            $mail->Subject = 'MyBlogSite Password Recovery';
            // Change following href to that of your correct changePassword.php location for local
            $mail->Body = "Please click on the link: <a href=https://cosc360-team4.herokuapp.com/passwordCode.php?email=".$email.">LINK</a> And input this code: ".$code;
            $mail->AddAddress($email);

            $mail->Send();
            echo "Email has been sent to the user '".$results['username']."' and email of '".$email."'";
        }else{
            echo "Email not found";
        }
    }

    mysqli_free_result($resultsCheck);
    mysqli_close($connection);
?>