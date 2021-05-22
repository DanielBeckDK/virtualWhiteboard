<?php

$postsArray = [];
$teamId = $_SESSION['teamId'];

//Use the stored teamId to find all the posts made by team-members of the logged in user
$sql = "SELECT * FROM posts WHERE team_id = \"$teamId\" ORDER BY post_date DESC";
$result = $conn->query($sql);
$i = 0;

while ($row = $result->fetch_object()) {

    //Use the userid associated with each post to get the username of the user that made the post
    $sqlUser = "SELECT * FROM users WHERE user_id = \"$row->user_id\"";
    $resultUser = $conn->query($sqlUser);
    $rowUser = $resultUser->fetch_object();

    //Put post data in an array to be used when printing the post's on the index page
    $postData = array(
        "postId" => $row->post_id,
        "postDate" => $row->post_date,
        "userId" => $row->user_id,
        "postText" => $row->post_text,
        "isImage" => $row->is_image,
        "isYoutube" => $row->is_youtube,
        "postContent" => $row->post_content,
        "teamId" =>  $row->team_id,
        "userName" => $rowUser->first_name . " " . $rowUser->last_name,
    );

    //Put the post data in an array that then will contain all posts created by the correct team
    $postsArray[$i] = $postData;
    $i++;
}
