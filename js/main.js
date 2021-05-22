function createYoutubePost() {
  let container = document.querySelector(".createPostContainer");
  container.innerHTML =
    "<h1>Create post</h1>" +
    '<form class="youtubePostForm form" method="post" action="insertYoutubePost.php">' +
    "<label>" +
    "<p>Insert youtube link:</p>" +
    '<input class="postInput" type="text" minlength="30" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ" name="youtubeLink">' +
    "</label>" +
    "<label>" +
    "<p>Write a message</p>" +
    '<textarea class="postMessageInput" maxlength="199" rows="3" placeholder="Look at this amazing video guys! :O" name="youtubeMessage"></textarea>' +
    "</label>" +
    '<button class="btn" type="submit">Create</button>' +
    '<button onclick="cancelPost();" class="btn">Cancel</button>' +
    "</form>";
}

function createTextPost() {
  let container = document.querySelector(".createPostContainer");
  container.innerHTML =
    "<h1>Create post</h1>" +
    '<form class="textPostForm form" method="post" action="insertTextPost.php">' +
    "<label>" +
    "<p>Write a message</p>" +
    '<textarea class="postMessageInput" maxlength="199" rows="3" placeholder="Have an absolutely positively amazingly swell days guys <3" name="textMessage"></textarea>' +
    "</label>" +
    '<button class="btn" type="submit">Create</button>' +
    '<button onclick="cancelPost();" class="btn">Cancel</button>' +
    "</form>";
}

function createImagePost() {
  let container = document.querySelector(".createPostContainer");
  container.innerHTML =
    "<h1>Create post</h1>" +
    '<form class="imagePostForm form" method="post" enctype="multipart/form-data" action="insertImagePost.php">' +
    "<label>" +
    "<p>Upload image:</p>" +
    '<input class="fileInput" type="file" name="imageFile">' +
    "</label>" +
    "<label>" +
    "<p>Write a message</p>" +
    '<textarea class="postMessageInput" maxlength="199" rows="3" placeholder="Have an absolutely positively amazingly swell days guys <3" name="imageMessage"></textarea>' +
    "</label>" +
    '<button class="btn" type="submit">Create</button>' +
    '<button onclick="cancelPost();" class="btn">Cancel</button>' +
    "</form>";
}

function cancelPost() {
  console.log("it does work");
  let container = document.querySelector(".createPostContainer");
  container.innerHTML =
    '<div class="createPostTitles">' +
    "<p>Share youtube video</p>" +
    "<p>Share text</p>" +
    "<p>Share image</p>" +
    "</div>" +
    '<div class="createPostButtons">' +
    '<i onclick="createYoutubePost();" class="fab fa-youtube fa-2x"></i>' +
    '<i onclick="createTextPost();" class="fas fa-align-justify fa-2x"></i>' +
    '<i onclick="createImagePost();" class="fas fa-images fa-2x"></i>' +
    "</div>";
}
