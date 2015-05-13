<?php
    include 'conf/secure.php';
    $conn_st = mysql_connect($host_db,$user_db,$pass_db) or die ("Could not connect: " .mysql_error());
    mysql_select_db($data_db);
    
    $user = $_POST['username'];
    $pass = $_POST['password'];

    mysql_query('INSERT INTO Users (Username, Password) VALUES ("'.$user.'", "'.$pass.'")') or die ("Could not insert: " .mysql_error());

    mysql_close($conn_st);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=users.php">';
?>
