<?php
date_default_timezone_set('Asia/Jakarta');
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sisfo_bld";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Base URL function
function base_url($path = '') {
    return 'http://localhost/supply_mtrl/' . ltrim($path, '/');
}



$dateNow = date('Y-m-d');
// $dateNow = '2025-02-16';
$timeNow = date('H:i:s');
// $timeNow = '06:00:00';

$shiftRanges = [
    'shift1' => ['start' => '06:45:00', 'end' => '14:45:00'],
    'shift2' => ['start' => '14:45:00', 'end' => '22:45:00'],
    'shift3' => ['start' => '22:45:00', 'end' => '06:45:00']
];

$sif = '';
if ($timeNow >= $shiftRanges['shift1']['start'] && $timeNow < $shiftRanges['shift1']['end']) {
    $sif = 'I';
} elseif ($timeNow >= $shiftRanges['shift2']['start'] && $timeNow < $shiftRanges['shift2']['end']) {
    $sif = 'II';
} else {
    if ($timeNow < $shiftRanges['shift3']['end']) {
        $dateNow = date('Y-m-d', strtotime('-1 day'));
    }
    $sif = 'III';
}