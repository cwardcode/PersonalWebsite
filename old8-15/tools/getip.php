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

function get_internal_ip() {
    $exec = exec("hostname");
    $hostname = trim($exec);
    $ip = gethostbyname($hostname);
    return $ip;
}
    $extern_ip = get_external_ip();
    $intern_ip = get_internal_ip();
    file_put_contents('/srv/http/tools/laptopIP.txt',$extern_ip,LOCK_EX);
    file_put_contents('/srv/http/tools/lLaptopIP.txt',$intern_ip,LOCK_EX);


?>

