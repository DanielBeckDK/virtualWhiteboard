<?php
session_start();
include_once('dbConnection.php');

//See if the fields from the youtube post form has been posted
if (isset($_POST['youtubeLink'])) {

    //See if the user has filled out both fields
    if ($_POST['youtubeMessage'] != '' && $_POST['youtubeLink'] != '') {

        //Insert an entry in the database with information about this new post 
        $userId = $_SESSION['userId'];
        $teamId = $_SESSION['teamId'];
        $currentDate = time();
        $youtubeLink = substr($_POST['youtubeLink'], -11);
        $message = $_POST['youtubeMessage'];
        $false = 0;
        $True = 1;

        $stmt = $conn->prepare("INSERT INTO posts (post_id, post_date, user_id, post_text, is_image, is_youtube, post_content, team_id) VALUES (null,?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("iisiisi", $currentDate, $userId, $message, $false, $True, $youtubeLink, $teamId);
        $stmt->execute();
        $stmt->insert_id;
    } else {

        $errorMessage = '<p class="errorMess">My silly friend, you forgot to fill out all the fields :D</p>';
    }
}

header("Location: index.php");