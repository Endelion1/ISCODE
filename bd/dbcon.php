<?
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "is";

// Create connection
$cms = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($cms->connect_error) {
    die("Connection failed: " . $cms->connect_error);
}
?>