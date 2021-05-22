<?php

// A function returning a complete post with content populated by the parameters
function getYoutubePost($name, $date, $text, $content)
{
    $youtubePost = "
        <div class='post'>
            <div class='postHeader'>
                <p class='postName'>$name</p>
                <p class='postDate'>$date</p>
            </div>
            <div class='postContent'>
                <p class='postText'>$text</p>
                <iframe width='100%' height='315' src='https://www.youtube.com/embed/$content' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>                
            </div>
        </div>
        
        ";
    return $youtubePost;
}
