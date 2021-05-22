<?php
// A function returning the login form
function getCreatePostMenu()
{
    $createPostMenu = " 
        <div class='createPostContainer'>
            <div class='createPostTitles'>
                <p>Share youtube video</p>
                <p>Share text</p>
                <p>Share image</p>
            </div>
            <div class='createPostButtons'>
                <i onclick='createYoutubePost();' class='fab fa-youtube fa-2x'></i>
                <i onclick='createTextPost();' class='fas fa-align-justify fa-2x'></i>
                <i onclick='createImagePost();' class='fas fa-images fa-2x'></i>
            </div>
        </div>
        ";
    return $createPostMenu;
}
