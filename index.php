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
					<div id="row">
						<div id="post">
							<div id="preset-row">
								<div id="row">
									<div id="blog-image">
									<img src="https://media.defense.gov/2020/Feb/19/2002251686/700/465/0/200219-A-QY194-002.JPG" width=90 height=90/>
									</div>
									<div id="spacer">
									</div>
									<div id="blog-info">
										<div id="row">
											<div id="info-title" class="info-inside">
											Title:
											</div>
											<div id="info-author" class="info-inside">
											Author:
											</div>
											<div id="info-views" class="info-inside">
											Views:
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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




<footer>

</footer>

</body>
</html>
