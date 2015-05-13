<?php
    session_start();
    unset($_SESSION['user']);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';    
    exit;
?>
