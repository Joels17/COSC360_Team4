
<?php
// Included where db connection is needed
$host = "localhost";
$database = "project360";
$user = "webuser";
$password = "P@ssw0rd";

//Get Heroku ClearDB connection information
//$host = "us-cdbr-east-03.cleardb.com";
//$database = "heroku_3a9bf1367309f32";
//$user = "bb9e705b04bc79";
//$password = "1e1b9a6f";

//change these values below to local if needed
$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}

?>
</html>
