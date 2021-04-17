<!DOCTYPE html>
<html>
<head>
    <title>MyBlogPost</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script defer type="text/JavaScript" src="scripts/index.js"></script>
</head>
<body>

	<?php
		include "header.php";
		session_start();
		if(isset($_SESSION['logged-out'])){
			if($_SESSION['logged-out'] == 1){
				$_SESSION = array();
				session_destroy();
				echo "<script type='text/javascript'>alert('You have been logged out');</script>";
			}
		}
		if(isset($_SESSION['user'])){
			include "scripts/database_connect.php";
			$sqlCheck = "SELECT disabled FROM users WHERE username = ?;";
			$stmtCheck = mysqli_stmt_init($connection);
			if(!mysqli_stmt_prepare($stmtCheck, $sqlCheck)){
				echo "SQL statement failed";
			}else{
				mysqli_stmt_bind_param($stmtCheck, "s", $_SESSION['user']);
				mysqli_stmt_execute($stmtCheck);
				$resultsCheck = mysqli_stmt_get_result($stmtCheck);
				$results = mysqli_fetch_assoc($resultsCheck);
				if($results['disabled'] == 1){
					header("Location: scripts/logout_script.php");
				}
			}
		}

	?>

    <div class="content">
		<div class="column-left" id="column1">
			<div id="row">
				<div id="h3-textbox">
					<h3>Trending Posts</h3>
				</div>
				<div id="select-box">
					<label for="sort-posts" id="select-sort">Sort By:</label>

					<select id="sort-posts">
					  <option value="views">Top Views</option>
					  <option value="newest">Newest</option>
					</select>
				</div>
				<div id="search-box">
					<label for="topicSearch" class="topicSearch-box"><span class = "topic-span">Search for a Topic:</span> </label>
					<input placeholder = "Topic Search" type="text" name = "topicSearch" id="topicSearch">
				</div>
			</div>
				<div id="left-wrapper">
					<!-- DIV CLASS ROW IS ADDED INSIDE HERE 	\"data:image/jpeg;base64,". base64_encode( $results['img'] ) ."\"	-->
					<div id="blogSection">
					<?php
						include "sortBy.php";
					?>
					</div>
					<!-- END OF DIV CLASS ROW ADDED HERE -->
				</div>
		</div>
		<div class="column-right" id="column2">
			<?php 
                if(isset($_SESSION['user'])){
            ?>
			<div id="row">
				<div id="h3-textbox">
					<h3>Your Posts</h3>
				</div>
			</div>
					<div id="right-wrapper">
					<!-- DIV CLASS ROW IS ADDED INSIDE HERE -->
					<?php
						include "scripts/database_connect.php";
						
						echo "<div id=\"row\">";
							echo "<div id=\"post\">";
								echo "<div id=\"preset-row\">";
									echo "<a href=\"createBlog.php\">";
									echo "<div id=\"row\">";
										echo "<div id=\"blog-create-container\">";
											echo "<div id=\"create-post-words\">";
												echo "Create A New Post";
											echo "</div>";
										echo "</div>";
										echo "<div id=\"spacer\">";
										echo "</div>";
										echo "<div id=\"spacer\">";
										echo "</div>";
										echo "<div id=\"create-blog-image\">";
											echo "<img src=\"https://icon-library.net/images/icon-plus-sign/icon-plus-sign-18.jpg\" width=90 height=90>";
										echo "</div>";
									echo "</div>";
									echo "</a>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
						
						//BLANK SPACER DO NOT ADD ANYTHING INTO THIS
						echo "<div id=\"row\">";
							echo "<div id=\"post-blank\">";
								echo "<div id=\"preset-row-blank\">";	
								echo "</div>";
							echo "</div>";
						echo "</div>";
						
						
						$sqlMyBlogs = "SELECT id, title, views, img FROM blogs B, users U WHERE B.uploadUser = U.username AND uploadUser = ? ORDER BY B.views DESC LIMIT 10;";
						$stmtCheck = mysqli_stmt_init($connection);
						$username = $_SESSION['user'];
						if(!mysqli_stmt_prepare($stmtCheck, $sqlMyBlogs)){
							echo "SQL statement failed";
						}else{
							mysqli_stmt_bind_param($stmtCheck, "s", $username);
							mysqli_stmt_execute($stmtCheck);
							$resultsCheck = mysqli_stmt_get_result($stmtCheck);
							while ($myRow = mysqli_fetch_assoc($resultsCheck))
							{
								echo "<div id=\"row\">";
									echo "<div id=\"post\">";
										echo "<div id=\"preset-row\">";
											echo "<a href=\"blogPage.php?blogId=" . $myRow['id'] . "\">";
											echo "<div id=\"row\">";
												echo "<div id=\"blog-image\">";

													echo '<img id="profile-pic" src="data:image/jpeg;base64,'. base64_encode($myRow['img']) .'" width=90 height=90/>';

												echo "</div>";
												echo "<div id=\"spacer\">";
												echo "</div>";
												echo "<div id=\"blog-info\">";
													echo "<div id=\"row\">";
														echo "<div id=\"info-title\" class=\"info-inside\">";
															echo "Title: " . $myRow['title'];
														echo "</div>";
														echo "<div id=\"info-author\" class=\"info-inside\">";
															echo "Author: Me";
														echo "</div>";
														echo "<div id=\"info-views\" class=\"info-inside\">";
															echo "Views: " . $myRow['views'];
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
							mysqli_close($connection);
					?>
					<!-- END OF DIV CLASS ROW ADDED HERE -->
				</div>
				</div>
			<?php }else{ ?>
			<div id="box-container">
				<p class="login-text">
					Interested in making your own Blog post?
				</p>
				<div class="box">
					<div class="login-box">
						<form action="login.php">
							<input type="submit" id="login-box-button" value="Login"/>
						</form>
					</div>
					<h4>OR</h4>
					<div class="register-box">
						<form action="register.php">
							<input type="submit" id="register-box-button" value="Register"/>
						</form>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
    </div>
	<script>
		var select = document.getElementById('sort-posts');
		var search = document.getElementById('topicSearch');
		search.addEventListener('input', (e) => {
			console.log(e.target.value);
			$.get("sortBy.php?keyword="+e.target.value).done(function(data){
            $("#blogSection").html(data);
		});
		});
		select.addEventListener('change', (e) => {
			alert("Please wait a few seconds for blog sorting: "+e.target.value);
			$.get("sortBy.php?sort="+e.target.value).done(function(data){
            $("#blogSection").html(data);
		})});


	</script>
	<?php
		include "footer.php";
	?>

</body>
</html>
