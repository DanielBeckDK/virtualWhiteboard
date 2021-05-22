<?php

// A function returning a complete post with content populated by the parameters
function getImagePost($name, $date, $text, $content)
{
    $imagePost = "
        <div class='post'>
            <div class='postHeader'>
                <p class='postName'>$name</p>
                <p class='postDate'>$date</p>
            </div>
            <div class='postContent'>
                <p class='postText'>$text</p>
                <img src='assets/images/userImages/$content' alt='Post image'>
            </div>
        </div>
        ";
    return $imagePost;
}
