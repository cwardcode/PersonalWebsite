<?php
require("config.php");
include("lib/GGeoCoder.php");
function parseToXML($htmlStr) 
{ 
    $xmlStr=str_replace('<','&lt;',$htmlStr); 
    $xmlStr=str_replace('>','&gt;',$xmlStr); 
    $xmlStr=str_replace('"','&quot;',$xmlStr); 
    $xmlStr=str_replace("'",'&#39;',$xmlStr); 
    $xmlStr=str_replace("&",'&amp;',$xmlStr); 
    return $xmlStr; 
} 
//Cullowhee Latitude
$cullolat = 35.3112808;                                                         
//Cullowhee Longitude
$cullolng = -83.1828630; 


// Opens a connection to a MySQL server
$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {
    die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
    die ('Can\'t use db : ' . mysql_error());
}

// Select the most recent rows added to Location table
$query = "SELECT * 
    FROM DataTest;";
$result = mysql_query($query);

if (!$result) {
    die('Invalid query: ' . mysql_error());
}
$count=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
    //Check if we need to add latitude
    if($row['Lat']==0 && $row['Lng']==0) {
        // Pass addr to Geocode and find lat/long
        $ggeo = get_ggeocoder_json(parseToXML($row['Address']),'','ro'); 
        //assign lat/long results to var for update later
        $lat = $ggeo->results['latitude'];
        $lng = $ggeo->results['longitude'];
        //update strings
        $updlatsql = "UPDATE DataTest SET Lat='$lat' WHERE Address='$row[Address]';";
        $updlngsql = "UPDATE DataTest SET Lng='$lng' WHERE Address='$row[Address]';";
        //execute mysql query
        $updlatres = mysql_query($updlatsql);
        $updlngres = mysql_query($updlngsql);
        ++$count;
        //if either update is invalid, die.
        if(!$updlngres || !$updlatres) {
            die('Invalid Query: ' . mysql_error());
        }
    }
    //Check if we need to add mileage
    if($row['mileage']==0) {
        //insert mileage stuff here
    }
}

if($count==0) {                                                                 
    echo "Finished, nothing modified. <br/>";                              
} else {
    echo "Finished! <br/>";
    echo "Modified $count rows";
}
?>
