<?php
// A function returning the login form
function getLoginForm()
{
    $loginForm = " 
        <form class='loginForm form' method='post'>
            <h1>Login</h1>
            <label>
                <p>Email:</p>
                <input class='loginInput' type='email' placeholder='example@email.com' name='userEmail'>
            </label>
            <label>
                <p>Password:</p>
                <input class='loginInput' type='password' placeholder='MyStr0ng.PW-example' name='userPassword'>
            </label>
            <button class='btn' type='submit'>Login</button>            
        </form>
        ";
    return $loginForm;
}
