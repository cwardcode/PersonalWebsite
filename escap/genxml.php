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

$cullolat = 35.3112808;
$cullolng = -83.1828630;

function getDist($latin, $lngin) {

}
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

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  echo '<marker ';
  echo 'LName="' . parseToXML($row['LName']) . '" ';
  echo 'FName="' . $row['FName'] . '" ';
  echo 'Address="' . parseToXML($row['Address']) . '" ';
  echo 'lat="' . $row['Lat'] . '" ';  
  echo 'lng="' . $row['Lng'] . '" ';  
  echo 'mileage="' . $row['mileage'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';
?>
