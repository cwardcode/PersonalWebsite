<?php                                                                           
    include 'conf/secure.php';
    mysql_connect($host_db,$user_db,$pass_db);
    mysql_select_db($data_db);
    $issue_id = $_POST['edit'];
    if(isset($_POST['remIssue'])){
        $sql = "DELETE FROM Issues WHERE issue_id='$issue_id'";
        mysql_query($sql) or die('Query failed'.mysql_query()); 
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=edit_issue.php">';
    } else if (isset($_POST['addIssue'])){
        echo "<form method='post' action='saveChanges.php'><table border='1'><tr><th>Name</th><th>Body</th></tr>";
        print "<tr><td><input type='text' name='newName'size='50'/></td><td><input type='text' name='newBody' size='200'/></td></tr>";
        print "<input type='hidden' name='issueID' value='".$r['issue_id']."'/>";
        print "</table>"; 
        print"<input type='submit' name='addIssues' value='Submit News'/>";
    } else {
        $sql = "SELECT * FROM Issues";
        $q   = mysql_query($sql) or die('Could not select from DB'.mysql_error());
        echo "<form method='post' action='saveChanges.php'><table border='1'><tr><th>Name</th><th>Body</th></tr>";

        while($r = mysql_fetch_array($q)) {
            if($r['issue_id'] == $issue_id){
            print "<tr><td>".$r['issue_name']."</td><td>".$r['issue_body']."</td></tr>";
            print "<tr><td><input type='text' name='newName'size='50'/></td><td><input type='text' name='newBody' size='200'/></td></tr>";
            print "<input type='hidden' name='issueID' value='".$r['issue_id']."'/>";
            }
        }
        print "</table>";
        print"<input type='submit' name='subChanges' value='Submit Revision'/>";
    }
?> 
