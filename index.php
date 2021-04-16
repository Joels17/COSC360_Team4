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
	?>

    <div class="content">
		<div class="column-left" id="column1">
			<h3>Trending Posts</h3>
				<div id="left-wrapper">
					<!-- DIV CLASS ROW IS ADDED INSIDE HERE -->
					<?php
						include "scripts/database_connect.php";
						
						$sqlBlogs = "SELECT title, views, uploadUser FROM blogs B WHERE B.views > 10;";
						$error = mysqli_connect_error();
						if($error != null)
						{
						  $output = "<p>Unable to connect to database!</p>";
						  exit($output);
						}
						else{
							$results = mysqli_query($connection, $sqlBlogs);
							while ($row = mysqli_fetch_assoc($results))
							{
								echo "<div id=\"row\">";
									echo "<div id=\"post\">";
										echo "<div id=\"preset-row\">";
											echo "<div id=\"row\">";
												echo "<div id=\"blog-image\">";
													echo "<img src=\"https://media.defense.gov/2020/Feb/19/2002251686/700/465/0/200219-A-QY194-002.JPG\" width=90 height=90/>";
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
										echo "</div>";
									echo "</div>";
								echo "</div>";
							}
							
						}
							mysqli_close($connection);
					?>
					
					<!-- DIV CLASS ROW IS ADDED INSIDE HERE -->
				</div>
		</div>
		<div class="column-right" id="column2">
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
		</div>
    </div>




	<?php
		include "footer.php";
	?>

</body>
</html>
