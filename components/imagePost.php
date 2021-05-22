<?php

// A function returning a complete post with content populated by the parameters
function getImagePost($name, $date, $text, $content, $postId, $userId)
{

    $deleteBtn = '';
    if ($_SESSION['userId'] == $userId) {
        $deleteBtn = "<a class='deleteBtn' href='delete.php?postId=$postId'>Delete</a>";
    }


    $imagePost = "
        <div class='post'>
            <div class='postHeader'>
                <p class='postName'>$name</p>
                <p class='postDate'>$date</p>
                $deleteBtn
            </div>
            <div class='postContent'>
                <p class='postText'>$text</p>
                <img src='assets/images/userImages/$content' alt='Post image'>
            </div>
        </div>
        ";
    return $imagePost;
}
