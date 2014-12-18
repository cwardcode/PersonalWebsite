<?php
$newPass = $_POST['password'];
#$userId  = $_POST['userID'];
$userId  = 9;
include 'conf/secure.php';                                                  
$conn_st=mysql_connect($host_db,$user_db,$pass_db) or die ("Could not connect: " .mysql_error());
$db_sel = mysql_select_db($data_db);     
mysql_query('UPDATE Users SET Password="'.$newPass.'" WHERE id="'.$userId.'"') or die('Unable to change password'.mysql_error());
mysql_close($conn_st);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=users.php">';
?>
