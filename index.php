<?php
session_start();
$errorMess = '';
$content = '';
$message = '';
$errorMessage = '';
$createPostMenu = '';
include_once('dbConnection.php');
include_once('components/header.php');
include_once('components/loginForm.php');
include_once('components/createPost.php');
include_once('components/youtubePost.php');
include_once('components/textPost.php');
include_once('components/imagePost.php');
include_once('login.php');

//check if user is logged in by looking for the session being set when user logs in
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {

  include_once('selectPosts.php');

  //use stores session details about the user to create a nice greeting
  $name = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
  $teamName = $_SESSION['teamName'];

  $message = "    
      <p>Welcome </p>
      <p class='name'>$name </p>
      <p>from team: </p>
      <p class='teamName'>$teamName</p>                   
    ";

  //get the menu that allows the user to create different posts
  $createPostMenu = getCreatePostMenu();

  // For each of the post's found in the database, use the different post components to show the post on the virtual whiteboard
  foreach ($postsArray as $post) {

    //check what kind of post it is and use the corresponding post component and populate it with data
    if ($post['isImage']) {

      $content = $content . getImagePost($post['userName'], date('H:i d/m/Y ', $post['postDate']), $post['postText'], $post['postContent']);
    } else if ($post['isYoutube']) {

      $content = $content . getYoutubePost($post['userName'], date('H:i d/m/Y ', $post['postDate']), $post['postText'], $post['postContent']);
    } else {

      $content = $content . getTextPost($post['userName'], date('H:i d/m/Y ', $post['postDate']), $post['postText']);
    }
  }
} else {

  //Or else get the login form and show that so that the user can login
  $content = getLoginForm();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="assets/images/virtualWhiteboardFavicon.png" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/main.css" />
  <title>Virtual whiteboard</title>
</head>

<body>
  <div class="siteContainer">
    <?= getHeader(); ?>
    <div class="infoContainer">
      <?= $message; ?>
      <?= $errorMessage; ?>
    </div>
    <?= $createPostMenu; ?>
    <div class="contentContainer">

      <?= $content; ?>
    </div>
  </div>
</body>
<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/54a5c9bcfe.js" crossorigin="anonymous"></script>

</html>