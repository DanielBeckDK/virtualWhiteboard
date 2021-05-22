<?php
session_start();
include_once('dbConnection.php');
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {

    header("Location: index.php");
}
unset($_SESSION['errorMess']);
$postId = $_GET['postId'];
$sql = "DELETE FROM posts WHERE post_id = \"$postId\"";
$conn->query($sql);


header("Location: index.php");
