<html>
<head>
<!--    <link rel="stylesheet" type="text/css/" href="css/main.css" media="screen"/> -->
    <?php
       function get_external_ip() {
            $ch = curl_init("http://icanhazip.com/");
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($ch);
            curl_close($ch);
            if ($result === FALSE) {
                return "ERROR";
            } else {
                return trim($result);
            }
        } 
    $extern_ip = get_external_ip();
    ?>
</head>
<body>
    <?php
	session_start();
    include 'conf/secure.php';
        if (!isset($_SESSION['user']) || $_SESSION['user'] == -1) {                 
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';    
        }
    ?>
    <form class="header" align="center">
        <?php echo "Welcome, ".$_SESSION['user']."!";?>
    </form>
    <table align="center">
        <tr>
            <td>
                <form class="main" action="edit_user.php" method="POST">
                Manage Users:    
                <br/>
               <?php
                    include 'conf/secure.php';
                    $conn_st=mysql_connect($host_db,$user_db,$pass_db) or die ("Could not connect: " .mysql_error());
                    $db_sel = mysql_select_db($data_db);
                    $result = mysql_query("SELECT id,Username,Password from Users");
                    echo "<table border='1'><tr><th>Edit</th><th>User</th><th>Pass</th></tr>";
                    $i = 1;
                    while($row = mysql_fetch_array($result)){
                        print "<tr><td><input type='radio' name='edit' value=".$row['id']."></td><td>".$row['Username']."</td><td>".$row['Password']."</td></tr>";
                        $i++;
                    }
                    print "</table>";      
                    mysql_close($conn_st);
                 ?> 
                <input type="submit" name="addUser" value="Add New User"/>
                <input type="submit" name="submit" value="Edit User"/>
                <input type="submit" name="removeUser" value="Remove User"/>
                </form>
            </td>
            <td/>
            <td>
                <form class="main">
                    What would you like to do?
                    <ul>
                        <li><a href="welcome.php">Admin Home</a></li>
                        <li><a href="edit_issue.php">Manage News</a></li>
                        <li><a href="users.php">Manage Users</a></li>
                        <li><a href="logout.php">Logout</a></li><br/><br/><br/>
                    </ul>
                </form>
            </td>
        </tr>
    </table>
</body>
</head>
</html>
