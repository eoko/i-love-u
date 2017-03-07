<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<?php

$ip = $_SERVER['REMOTE_ADDR'];
$ip_file = 'ip.txt';
$separator = "\n";

if (!file_exists($ip_file)) {
    file_put_contents($ip_file, '');
}

$ip_file_content = file_get_contents($ip_file);
$ips = explode($separator, $ip_file_content);
$liked = in_array($ip, $ips);
?>
</html>