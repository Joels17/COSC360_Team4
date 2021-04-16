<head>
<link rel="stylesheet" href="header.css">
</head>
<body>
<div class ="header" id="headerContainer">
        <header id="header1">

            <nav id="nav">
                <a href="index.php">Home</a>
                <a href="index.php">MyBlogPost</a>
                <?php 
                    session_start();
                    if(isset($_SESSION['user'])){
                        if(isset($_SESSION['admin'])){
                            if($_SESSION['admin'] == 1){
                            ?> <a href="admin.php">Admin</a><?php
                            }
                        }
                ?>
                    <a href="account.php">Account</a>
                    <a id="logout" href="scripts/logout_script.php">Logout</a>
                <?php }else{ ?>
                    <a href="login.php">Login</a>
                <?php } ?>
            </nav>
        </header>
    </div>
</body>