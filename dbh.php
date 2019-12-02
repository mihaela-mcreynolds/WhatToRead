<?php
//
// 1. Connect to local mySQL installation. User and password provided.
//
$db = mysqli_connect("localhost","c2375a03","c2375aU!");
if (mysqli_errno($db))
  exit("Error - Could not connect to MySQL");

//
// 2. Select the database to use.
//
$er = mysqli_select_db($db,"c2375a03test");

if (!$er)
  exit("Error - Could not select the database!");
