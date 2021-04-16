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
                ?>
                    <a href="login.php">Account</a>
                <?php }else{ ?>
                    <a href="login.php">Login</a>
                <?php } ?>
            </nav>
        </header>
    </div>
</body>