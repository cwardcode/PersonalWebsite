<?php
include 'conf/secure.php';
mysql_connect($host_db,$user_db,$pass_db);
mysql_select_db($data_db);
$sql = "SELECT * FROM Issues";
$q   = mysql_query($sql) or die('Could not select from db'.mysql_error());
$xml = "<issues>";
while($r = mysql_fetch_array($q)) {
    $xml .= "<issue>";
    $xml .= "<issue_id>".$r['issue_id']."</issue_id>";
    $xml .= "<issue_name>".$r['issue_name']."</issue_name>";
    $xml .= "<issue_body>".$r['issue_body']."</issue_body>";
    $xml .= "</issue>";
}
$xml .= "</issues>";
$sxe = new SimpleXMLElement($xml);
$sxe->asXML("issues.xml");
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=edit_issue.php">';
?>
