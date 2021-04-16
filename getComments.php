<?php
    include "scripts/database_connect.php";
    $blogIdComment = $_GET['blogId'];
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
    mysqli_free_result($resultsComment);
    mysqli_close($connection);
?>