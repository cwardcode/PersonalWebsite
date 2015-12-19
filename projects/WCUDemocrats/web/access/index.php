<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

    <?php
        if(isset($_SESSION['user']) && $_SESSION['user'] != -1) {
            header("Location: welcome.php");
        }
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>WCU Democrat App Login</title>
    <link rel="stylesheet" type="text/css/" href="css/main.css" media="screen"/>
</head>

<body>
<form class="header">
<label> Welcome to the WCU Democrat App Administration Panel<br/>
        Please Log in.</label>
</form>
<form action="auth.php" method="POST">
    
        <label>Username:</label>
            <input type="text" name="pma_username" />
        <label>Password:</label>
            <input type="password" name="pma_password"  />
            <?php if(isset($_SESSION['error'])) { echo "Invalid User/Pass";} ?>
            <input type="submit" value="Submit" name="submit" class="submit" />
</form> 

</body>
</html>


