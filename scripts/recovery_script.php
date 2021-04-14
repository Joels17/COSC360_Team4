<?php
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        die("Incorrect request method");
    };

    function rand_string( $length ) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    
    }

    include "database_connect.php";
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';
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

            $sqlLookup = "SELECT email FROM tempCode WHERE email = ?";
            $stmtLookup = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmtLookup, $sqlLookup)){
                echo "SQL statement failed";
            }else{
                mysqli_stmt_bind_param($stmtLookup, "s", $email);
                mysqli_stmt_execute($stmtLookup);
                $resultsLookup = mysqli_stmt_get_result($stmtLookup);
                $resultsL = mysqli_fetch_assoc($resultsLookup);
                $code = rand_string(10);
                $hashCode = md5($code);
                if(empty($resultsL)){

                    $sqlCode = "INSERT INTO tempCode (email, code) VALUES (?, ?)";
                    $stmtCode = mysqli_stmt_init($connection);
                    if(!mysqli_stmt_prepare($stmtCode, $sqlCode)){
                        echo "SQL statement failed";
                    }else{
                        mysqli_stmt_bind_param($stmtCode, "ss", $email, $hashCode);
                        mysqli_stmt_execute($stmtCode);
                    }
                }else{


                    $sqlCode = "UPDATE tempCode SET email=?, code=? WHERE email=?";
                    $stmtCode = mysqli_stmt_init($connection);
                    if(!mysqli_stmt_prepare($stmtCode, $sqlCode)){
                        echo "SQL statement failed";
                    }else{

                        mysqli_stmt_bind_param($stmtCode, "sss", $email,$hashCode,$email);
                        mysqli_stmt_execute($stmtCode);
                    }
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
                // For remote https://cosc360-team4.herokuapp.com/passwordCode.php?email=
                $mail->Body = "Please click on the link: <a href=http://localhost/Project/COSC360_Team4/passwordCode.php?email=".$email.">LINK</a> And input this code: ".$code;
                $mail->AddAddress($email);
    
                $mail->Send();
                echo "Email has been sent to the user '".$results['username']."' and email of '".$email."'";
            }


        }else{
            echo "Email not found";
        }
    }

    mysqli_free_result($resultsCheck);
    mysqli_close($connection);
?>