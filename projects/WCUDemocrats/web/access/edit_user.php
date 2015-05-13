<html>
<body>
<?php
    include 'conf/secure.php';
    $conn_st=mysql_connect($host_db,$user_db,$pass_db) or die ("Could not connect: " .mysql_error());
    $db_sel = mysql_select_db($data_db); 
    if(isset($_POST['addUser'])){
        echo "<form method='POST' action='addUser.php'>Username:<br><input type='text' name='username'/> <br>Password:<br><input type='password' name='password'/><br><input type='submit' name='addUser' value='Add User'/></form>";
    } else if(isset($_POST['removeUser'])) {
    $user_id = $_POST["edit"];                                                  
    $result = mysql_query("DELETE FROM Users WHERE Users.id='$user_id'") or die("Could not delete: ".mysql_error());  
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=users.php">';
    }
    else {
    $user_id = $_POST["edit"];
    $result = mysql_query("SELECT Username,Password from Users WHERE Users.id='$user_id'");
    echo "<table border='1'><tr><th>User</th><th>Pass</th></tr>";
    while($row = mysql_fetch_array($result)){
        print "<tr><td>".$row['Username']."</td><td>".$row['Password']."</td></tr>";
    }
    print "</table>";
    echo "<form action='changePass.php' method='post'>Change Password:<br><input type='password' name='password'/><input type='submit' name='Submit' value='change'/></form>";
    mysql_close($conn_st);
    }
?>


</body>
</html>
