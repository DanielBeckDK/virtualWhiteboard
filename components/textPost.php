<?php

// A function returning a complete post with content populated by the parameters
function getTextPost($name, $date, $text)
{
    $textPost = "
        <div class='post'>
            <div class='postHeader'>
                <p class='postName'>$name</p>
                <p class='postDate'>$date</p>
            </div>
            <div class='postContent'>
                <p class='postText'>$text</p>                
            </div>
        </div>
        ";
    return $textPost;
}
