<?php
    include 'conf/secure.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $conn_st=mysql_connect($host_db,$user_db,$pass_db) or die ("Could not connect: " .mysql_error());
    mysql_select_db($data_db, $conn_st) or exit('Error selecting Database: '.mysql_error());;

    $user_id=$_POST["pma_username"];
    $pass_id=$_POST["pma_password"];
    $err_msg="";
    $sql_cmd="SELECT * FROM Users where Username='$user_id' and Password='$pass_id'";
    
    $result=mysql_query($sql_cmd, $conn_st) or exit('$sql failed: '.mysql_error());
    $num_rows=mysql_num_rows($result);
    
    if($num_rows == 0) {
        $_SESSION['error'] = '1';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
    } else {
        if(isset($_SESSION['error'])) 
        {
            unset($_SESSION['error']);
        }
        $_SESSION['user']= $user_id;
        $_SESSION['pma_username']= $user_id;
        $_SESSION['pma_password']= $pass_id;
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=welcome.php">';
        exit;
    }
?>
