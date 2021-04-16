<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    session_start();
    $_SESSION['logged-out'] = 1;
    header("Location: ../index.php");
?>