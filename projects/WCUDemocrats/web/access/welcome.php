<html>
<head>
<!--    <link rel="stylesheet" type="text/css/" href="css/main.css" media="screen"/>-->
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
                <form class="main">
                <p>
                    Welcome to the College Democrats of Western Carolina University's 
                    application administration page!</p><br>
                    <p>Here you may add other users to access this site, 
                    from here you may also manage news that shows up 
                    within the mobile application.
                    </p><br/>
                </form>
            </td>
            <td/>
            <td>
                <form class="main">
                    What would you like to do?
                    <ul>
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
