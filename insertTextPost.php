<?php
session_start();
include_once('dbConnection.php');
if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn']) {

    header("Location: index.php");
}
unset($_SESSION['errorMess']);
if (isset($_POST['textMessage'])) {

    //Check of the message field was filled out
    if ($_POST['textMessage'] != '') {

        //Insert an entry in the database with information about this new post 
        $userId = $_SESSION['userId'];
        $teamId = $_SESSION['teamId'];
        $currentDate = time();

        $message = $_POST['textMessage'];
        $false = 0;

        $stmt = $conn->prepare("INSERT INTO posts (post_id, post_date, user_id, post_text, is_image, is_youtube, team_id) VALUES (null,?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("iisiii", $currentDate, $userId, $message, $false, $false, $teamId);
        $stmt->execute();
        $stmt->insert_id;
        echo $stmt->error;
    }

    // Or else provide the user with error messages so they know what went wrong
    else {
        $_SESSION['errorMess'] = '<p class="errorMess">My silly friend, you forgot to fill out all the fields :D</p>';
    }
}

header("Location: index.php");
