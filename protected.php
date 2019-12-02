<?php session_start();?>
<!DOCTYPE html>
<head></head>
<body>

<!-- this code segment will redirect the user to log in page
     if they try to access this file directly
-->
<?php
//print_r($_SESSION);
//print "user id is: ".$_SESSION['user_id'];
//print "session id: ".session_id();
if(!isset($_SESSION['user_id']))
  print "<p>not logged in</p><br><br>";
else{
print "<p>  This page is invisible (unless one is logged in). </p>";

print "user id is: ".$_SESSION['user_id'];

}
?>
</body>
</html>
