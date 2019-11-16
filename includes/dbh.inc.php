<?php

$servername = "localhost";
$dbusername = "user";
$pwd = "";
$dbname = "test";

$conn = mysqli_connect($servername, $username, $pwd, $dbname);

if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}
