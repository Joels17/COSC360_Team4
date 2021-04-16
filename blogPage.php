<!DOCTYPE html>
<html>
<head>
    <title>MyBlogPost</title>
    <link rel="stylesheet" href="blogPage.css">
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
                
                $sqlComment = "SELECT * FROM comments WHERE uploadBlog = ? ORDER BY datetime DESC;";
                $stmtComment = mysqli_stmt_init($connection);
                if(!mysqli_stmt_prepare($stmtComment, $sqlComment)){
                    echo "SQL statement failed";
                }else{
                    mysqli_stmt_bind_param($stmtComment, "i", $blogIdComment);
                    mysqli_stmt_execute($stmtComment);
                    $resultsComment = mysqli_stmt_get_result($stmtComment);
                    $count = 0;
                    while ($myRow = mysqli_fetch_assoc($resultsComment)){
                        $count = $count +1;
                        ?>
                        <div class="commentBox">
                            <div class="commentBody">
                            <?php
                                echo "<b>".$myRow['uploadUser']."</b>: <br>&emsp;".$myRow['commentBody'];
                            ?>
                            </div>
                            <div class="datetime">
                                <?php
                                    echo "<i>".$myRow['datetime']."</i>";
                                ?>
                            </div>
                        </div>
                        <?php
                        
                    }
                    echo $count==0?"<p id=\"noComments\">No comments on this blog post</p>":"";
                }
                mysqli_free_result($resultsBlog);
                mysqli_free_result($resultsComment);
                mysqli_close($connection);
            ?>
        <div>
    </div>
</body>