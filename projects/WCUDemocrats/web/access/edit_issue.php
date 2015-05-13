<html>
<head>
<!--    <link rel="stylesheet" type="text/css/" href="css/main.css" media="screen"/> -->
</head>
<body>
    <?php
	    session_start();
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
                <form action="edit.php" method="post" class="main">
                    <?php
                        include 'conf/secure.php';
                        mysql_connect($host_db,$user_db,$pass_db);
                        mysql_select_db($data_db);
                        $sql = "SELECT * FROM Issues";
                        $q   = mysql_query($sql) or die('Could not select from DB'.mysql_error());
                        echo "<table border='1'><tr><th>Edit</th><th>Name</th></tr>";
                        while($r = mysql_fetch_array($q)) {
                            print "<tr><td><input type='radio' name='edit' value=".$r['issue_id']."></td><td>".$r['issue_name']."</td></tr>";
                        }
                        print "</table>";
                    ?>
                    <input type="submit" name="submit" value="Edit selected"/>
                    <input type="submit" name="addIssue" value="Add more News"/>
                    <input type="submit" name="remIssue" value="Remove News"/>
                </form>

            </td>
            <td>
                <form class="main">
                    What would you like to do?
                    <ul>
                        <li><a href="welcome.php">Admin Home</a></li>
                        <li><a href="users.php">Manage Users</a></li>
                        <li><a href="edit_issue.php">Manage News</a></li>
                        <li><a href="logout.php">Logout</a></li><br/><br/><br/>
                    </ul>
                </form>
            </td>
        </tr>
    </table>
</body>
</head>
</html>
