<?php
// Here are the criterias for the database and also I create a mysqli object
// and store it in the $conn variable
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "virtual_whiteboard";
$conn = new mysqli($serverName, $userName, $password, $dbName);
