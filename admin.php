<head>
    <title>Admin Page</title>
	<link rel="stylesheet" href="admin.css">
    
</head>
<body>
<?php
   include "header.php";
   include "scripts/database_connect.php";
?>
	<div id="content">
		<div class="row">
			<div class ="column">
				<div class="enable-column">
					<?php
						echo '
						<form name="userEnable" method="get" action="">
							<p>
								<label><span class = "enable-span">Enter a User\'s Username to Enable:</span></label>
								<input placeholder = "Enter Username" type="text" name="enable-textbox" id="user-enable-box">
							</p>
								<label>
									<input type="submit" name="user-enable-button" value="Submit">
								</label>
						</form>';
						
						if(isset($_GET['enable-textbox'])){
						$search = $_GET['enable-textbox'];
						
						$sql = "UPDATE users SET disabled = 0 WHERE username = ?;";
						$stmtCheck = mysqli_stmt_init($connection);
						
						if(!mysqli_stmt_prepare($stmtCheck, $sql)){
							echo "SQL statement failed";
						}else{
							mysqli_stmt_bind_param($stmtCheck, "s", $search);
							mysqli_stmt_execute($stmtCheck);
							echo $search . " has been enabled!";
						}
						}
					?>
				</div>
			</div>
			<div class="column">
				<div class="user-column">
				<p>Input Username, Email, or Post Topic</p>
				<?php
					echo '
					<form name="userSearch" method="get" action="">
						<p>
							<label><span class = "search-span">Search for a User:</span></label>
							<input placeholder = "User Search" type="text" name="user-textbox" id="user-search-box">
						</p>
						<p>
							<label>
								<input type="submit" name="user-search-button" value="Submit">
							</label>
						</p>
					</form>';
					
					if(isset($_GET['user-textbox'])){
						$search = $_GET['user-textbox'];
						
						echo "<div id=\"result-box\">";
						
						$sql = "SELECT * FROM users U, blogs B WHERE U.username = ? OR U.email = ? OR (B.title = ? AND U.username = B.uploadUser);";
						$stmtCheck = mysqli_stmt_init($connection);
						
						if(!mysqli_stmt_prepare($stmtCheck, $sql)){
							echo "SQL statement failed";
						}else{
							mysqli_stmt_bind_param($stmtCheck, "sss", $search, $search, $search);
							mysqli_stmt_execute($stmtCheck);
							$results = mysqli_stmt_get_result($stmtCheck);
							$row = mysqli_fetch_assoc($results);
								echo "<p>Username: " . $row['username'] . "</p>";
								echo "<p>First Name: " . $row['firstName'] . "</p>";
								echo "<p>Last Name: " . $row['lastName'] . "</p>";
								echo "<p>Email: " . $row['email'] . "</p>";
								
								if($row['disabled'] == 0){
									echo "<p>Disabled: False</p>";
								}else{
									echo "<p>Disabled: True</p>";
								}
								
								if($row['admin'] == 0){
									echo "<p>Admin: False</p>";
								}else{
									echo "<p>Admin: True</p>";
								}
								
								echo "</div>";
						}
					}
				?>
				</div>
			</div>
			<div class="column">
				<div class="disable-column">
					<?php
						echo '
						<form name="userDisable" method="get" action="">
							<p>
								<label><span class = "disable-span">Enter a User\'s Username to Disable:</span></label>
								<input placeholder = "Enter Username" type="text" name="disable-textbox" id="user-disable-box">
							</p>
								<label>
									<input type="submit" name="user-disable-button" value="Submit">
								</label>
						</form>';
						
						if(isset($_GET['disable-textbox'])){
						$search = $_GET['disable-textbox'];
						
						$sql = "UPDATE users SET disabled = 1 WHERE username = ?;";
						$stmtCheck = mysqli_stmt_init($connection);
						
						if(!mysqli_stmt_prepare($stmtCheck, $sql)){
							echo "SQL statement failed";
						}else{
							mysqli_stmt_bind_param($stmtCheck, "s", $search);
							mysqli_stmt_execute($stmtCheck);
							echo $search . " has been disabled!";
						}
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>