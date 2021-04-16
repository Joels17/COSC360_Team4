<!DOCTYPE html>
<html>
<head>
    <title>MyBlogPost</title>
    <link rel="stylesheet" href="blogPage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <?php
        include "header.php";
        include "scripts/database_connect.php";
    ?>
    <div class="content">
        <div class="column-left" id="column1">
            <?php
                if(!isset($_GET['blogId'])){
                    die("No blog id");
                }
                $blogId = $_GET['blogId'];
                $sqlBlog = "SELECT * FROM blogs WHERE id = ?;";
                $stmtBlog = mysqli_stmt_init($connection);
                if(!mysqli_stmt_prepare($stmtBlog, $sqlBlog)){
                    echo "SQL statement failed";
                }else{
                    mysqli_stmt_bind_param($stmtBlog, "i", $blogId);
                    mysqli_stmt_execute($stmtBlog);
                    $resultsBlog = mysqli_stmt_get_result($stmtBlog);
                    $results = mysqli_fetch_assoc($resultsBlog);
                    if(!empty($results)){
                        echo "<h2>".$results['title']."</h2>";
                        echo "<p>".$results['body']."</p>";
                        echo "<p class=\"uploadUser\">Author: ".$results['uploadUser']."</p>";
                        echo "<p class=\"uploadUser\">Views: ".$results['views']."</p>";

                        $views = $results['views'] +1;
                        $sqlViews = "UPDATE blogs SET views = ? WHERE id = ?;";
                        $stmtViews = mysqli_stmt_init($connection);
                        if(!mysqli_stmt_prepare($stmtViews, $sqlViews)){
                            echo "SQL statement failed";
                        }else{
                            mysqli_stmt_bind_param($stmtViews, "ii", $views, $blogId);
                            mysqli_stmt_execute($stmtViews);
                        }
                    }else{
                        echo "Incorrect blog id";
                    }
                }
                
            ?>
        </div>
        <div class="column-right" id="column2">
            <h2>Comments</h2>
            <?php
                $blogIdComment = $_GET['blogId'];
                if(isset($_SESSION['user'])){
                    ?>
                        <p>Leave a comment: </p>
                        <form action="./scripts/createComment_script.php?blogId=<?php echo $blogIdComment ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-comment">

                            <textarea id="commentBody" name="commentBody" rows="5" cols="60" placeholder="Comment Body" required></textarea>
                            
                            <button type = "submit" class = "submit"> <span class="button-content"> Post Comment </span></button>
                            </div>
                        </form>
                    <?php
                }else{
                    echo "<p id=\"commentLoginTag\">Login to leave a comment</p>";
                }

                if(!isset($_GET['blogId'])){
                    die("No blog id");
                }
                ?>
                <div id ="commentArea">
                    <?php
                        include "getComments.php";
                    ?>
                </div>
                <script> 
                    setInterval(() => {
                        $.get("getComments.php?blogId=<?php echo $blogIdComment ?>").done(function(data){
                        $("#commentArea").html(data);
                    });
                    }, 1000);
                    
                    
                </script>
                <?php
                mysqli_free_result($resultsBlog);
                
            ?>
        <div>
    </div>
</body>