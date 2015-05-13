<?php
    $issueID = $_POST['issueID'];
    $newName = $_POST['newName'];
    $newBody = $_POST['newBody'];

    echo "Issue ID: $issueID<br>";
    echo "New Name: $newName<br>";
    echo "New Body: $newBody<br>";
    include 'conf/secure.php';
    $conn_st = mysql_connect($host_db,$user_db,$pass_db) or die('Could not connect'.mysql_error());
    mysql_select_db($data_db);
    if(isset($_POST['addIssues'])){
        $sql = 'INSERT INTO Issues (issue_name,issue_body) VALUES ("'.$newName.'", "'.$newBody.'")';
        mysql_query($sql,$conn_st) or die('Could not query database!'.mysql_error());

    }
    else {
        if(isset($_POST['newName'])){
            if(empty($newName)){
            } else {
                $sql = 'UPDATE Issues SET issue_name="'.$newName.'" WHERE issue_id="'.$issueID.'"';
                mysql_query($sql,$conn_st) or die('Could not query database!'.mysql_error());
            }
        } 
        if(isset($_POST['newBody'])){
            if(empty($newBody)){
            } else {
                $sql = 'UPDATE Issues SET issue_body="'.$newBody.'" WHERE issue_id="'.$issueID.'"';
                mysql_query($sql,$conn_st) or die('Could not query database!'.mysql_error());
            }
        }
    }
    #echo '<META HTTP-EQUIV="Refresh" Content="0; URL=makeXml.php">';

?>
