<?php

if (!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn']) {
    header("Location: index.php");
}
session_start();
include_once('dbConnection.php');

//Check if image has been uploaded
if (isset($_FILES['imageFile'])) {

    //Check of the message field was filled out
    if ($_POST['imageMessage'] != '') {

        $imageDir = "assets/images/userImages/";
        $imageName = basename($_FILES["imageFile"]["name"]);
        $imageFile = $imageDir . basename($_FILES["imageFile"]["name"]);

        //Check if the image size is less than 10MB so that users don't upload 100MB pictures
        if ($_FILES["imageFile"]["size"] < 1000000) {

            //Check if file uploaded is an image
            $isImage = getimagesize($_FILES["imageFile"]["tmp_name"]);

            if ($isImage) {

                //Insert an entry in the database with information about this new post 
                $userId = $_SESSION['userId'];
                $teamId = $_SESSION['teamId'];
                $currentDate = time();

                $message = $_POST['imageMessage'];
                $false = 0;
                $true = 1;

                $stmt = $conn->prepare("INSERT INTO posts (post_id, post_date, user_id, post_text, is_image, is_youtube, post_content, team_id) VALUES (null,?, ?, ?, ?, ?, ?, ?)");

                $stmt->bind_param("iisiisi", $currentDate, $userId, $message, $true, $false, $imageName, $teamId);
                $stmt->execute();
                $stmt->insert_id;

                //Move the uploaded image to the userImages folder
                move_uploaded_file($_FILES["imageFile"]["tmp_name"], $imageFile);
            }

            // Or else provide the user with error messages so they know what went wrong
            else {

                $errorMessage = '<p class="errorMess">Error... hmm maybe it was not an image you uploaded? :I</p>';
            }
        } else {

            $errorMessage = '<p class="errorMess">Uh, my bags are full, maybe try an image smaller than 10MB :I</p>';
        }
    } else {

        $errorMessage = '<p class="errorMess">My silly friend, you forgot to fill out all the fields :D</p>';
    }
}

header("Location: index.php");
