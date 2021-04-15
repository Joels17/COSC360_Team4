
<?php
// Included where db connection is needed
// $host = "localhost";
// $database = "project360";
// $user = "webuser";
// $password = "P@ssw0rd";

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$host = $cleardb_url["host"];
$user = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$database = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
echo $cleardb_url;
$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}

?>
