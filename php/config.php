<?php
$serverHostname = "localhost";
$dbusername = "root";
$dbPassword = "";
$dbName = "natix";

$dbConnection = new mysqli($serverHostname, $dbusername, $dbPassword, $dbName);
if($dbConnection->connect_error){
   die("connection failed" . $dbConnection->connect_error);
}
else{
    echo("connnected successfully!");
}

?>
