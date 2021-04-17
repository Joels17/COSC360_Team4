<?php
    include "scripts/database_connect.php";
    $sort = "views";
    $key='%%';
    
    if(isset($_GET['keyword'])){
        $key=$_GET['keyword'].'%';
    }
    $sqlBlogs = "SELECT id, title, views, uploadUser, img FROM blogs B, users U WHERE B.uploadUser = U.username AND title LIKE ?";
    if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
    }
    if($sort == "views"){
        $sqlBlogs .= " ORDER BY B.views DESC LIMIT 10;";
    }elseif($sort == "newest"){
        $sqlBlogs .= " ORDER BY B.datetime DESC LIMIT 10;";
    }
    
    $stmtBlogs = mysqli_stmt_init($connection);
    if(!$stmtBlogs -> prepare($sqlBlogs)){
        echo "SQL statement failed";
    }else{
        $stmtBlogs->bind_param('s', $key);
        $stmtBlogs->execute();
        $result = $stmtBlogs->get_result();
        while ($row = mysqli_fetch_assoc($result)){
            echo "<div id=\"row\">";
                echo "<div id=\"post\">";
                    echo "<div id=\"preset-row\">";
                        echo "<a href=\"blogPage.php?blogId=" . $row['id'] . "\">";
                        echo "<div id=\"row\">";
                            echo "<div id=\"blog-image\">";
                                echo '<img src="data:image/jpeg;base64,'. base64_encode($row['img']) .'" width=90 height=90/>';
                            echo "</div>";
                            echo "<div id=\"spacer\">";
                            echo "</div>";
                            echo "<div id=\"blog-info\">";
                                echo "<div id=\"row\">";
                                    echo "<div id=\"info-title\" class=\"info-inside\">";
                                        echo "Title: " . $row['title'];
                                    echo "</div>";
                                    echo "<div id=\"info-author\" class=\"info-inside\">";
                                        echo "Author: " . $row['uploadUser'];
                                    echo "</div>";
                                    echo "<div id=\"info-views\" class=\"info-inside\">";
                                        echo "Views: " . $row['views'];
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "</a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
    }
?>