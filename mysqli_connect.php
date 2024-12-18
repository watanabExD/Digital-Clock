<?php
$host = 'localhost'; 
$username = 'joevinrussel'; // username mo sa xamp
$password = 'joevinrussel'; // password mo sa xamp
$database = 'members_casibua'; // name nung data base mo


$dbc = mysqli_connect($host, $username, $password, $database);


if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
