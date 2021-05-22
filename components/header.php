<?php

// A function returning the header content
function getHeader()
{
    //See if the user is logged in and show a logout button if they are
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {

        $nav = "
            <nav class='nav'>                    
                <a class='btn' href='logout.php'>Logout</a>
            </nav>
            ";
    }
    // Or else print a text advising the user to login
    else {

        $nav = "
            <p> Please login :)</p>
            ";
    }

    $header = "
        <header class='header'>
            <div class='logoContainer'>
                <a href='index.php'>
                    <img src='assets/images/virtualWhiteboardLogo.png' alt='Virtual Whiteboard Logo'>
                </a>
            </div>    
            $nav
        </header>
        ";

    return $header;
}
