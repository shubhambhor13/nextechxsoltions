<?php
$fp = @fsockopen("ssl://smtp.hostinger.com", 465, $errno, $errstr, 5);
if ($fp) {
    echo "Connected to Hostinger SSL on 465: " . trim(fgets($fp, 512)) . "\n";
    fclose($fp);
} else {
    echo "Failed to connect to Hostinger 465: ($errno) $errstr\n";
}

$fp587 = @fsockopen("smtp.hostinger.com", 587, $errno587, $errstr587, 5);
if ($fp587) {
    echo "Connected to Hostinger on 587: " . trim(fgets($fp587, 512)) . "\n";
    fclose($fp587);
} else {
    echo "Failed to connect to Hostinger 587: ($errno587) $errstr587\n";
}
