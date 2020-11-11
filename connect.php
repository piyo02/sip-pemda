<?php

$mysqli = new mysqli("localhost","root","alzidni00","sip_pemda");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>