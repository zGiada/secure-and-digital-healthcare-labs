<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "sdh_lab4";

$connessione = new mysqli($host,$user,$password,$db);

if($connessione == false){
    die("Error connection: ".$connessione->connect_error);
}
$username = $_GET['user'];
$pass = md5($_GET['pwd']);
$DateAndTime = date('Y-m-d H:i:s', time());  
$typeLog = "GET";

$sql = "INSERT INTO login_logs (username, md5_pwd, last_access, type_log)
VALUES ('$username', '$pass', '$DateAndTime', '$typeLog')";

if ($connessione->query($sql) === TRUE) {
  header("Location: /success.html");
} else {
  echo "Error: " . $sql . "<br>" . $connessione->error;
}

$connessione->close();

?>