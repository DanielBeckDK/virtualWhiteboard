<?php

//See if the fields from the login form has been posted
if (isset($_POST['userEmail']) && isset($_POST['userPassword'])) {

    //See if the user has filled out both fields
    if ($_POST['userEmail'] != '' && $_POST['userPassword'] != '') {

        //Connect to the database and find the user that has an email matching the one posted
        $password = $conn->real_escape_string($_POST['userPassword']);
        $email = $conn->real_escape_string($_POST['userEmail']);
        $sql = "SELECT * FROM users WHERE email = \"$email\"";
        $result = $conn->query($sql);

        //See if a result has been found
        if ($result->num_rows > 0) {

            $row = $result->fetch_object();
            $dbPassword = $row->password;

            //See if the password is correct and if it is, store userinformation in session
            if (password_verify($password, $dbPassword)) {

                $sqlTeam = "SELECT * FROM teams WHERE team_id = \"$row->team_id\"";
                $resultTeam = $conn->query($sqlTeam);
                $rowTeam = $resultTeam->fetch_object();

                $_SESSION['loggedIn'] = true;
                $_SESSION['userId'] = $row->user_id;
                $_SESSION['firstName'] = $row->first_name;
                $_SESSION['lastName'] = $row->last_name;
                $_SESSION['teamName'] = $rowTeam->team_name;
                $_SESSION['teamId'] = $row->team_id;
            }

            //Or else, provide the user with messages describing the problem
            else {

                $errorMessage = '<p class="errorMess" >Gosh darnit, the password was incorrect :(</p>';
            }
        } else {

            $errorMessage = '<p class="errorMess">Ohh no email not found :(</p>';
        }
    } else {

        $errorMessage = '<p class="errorMess">My silly friend, you forgot to fill out all the fields :D</p>';
    }
}
