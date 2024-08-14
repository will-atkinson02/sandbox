<?php

declare(strict_types = 1);

// Superglobals
// Predefined variables that are super global
// The variables ignore scope rules - you can access them from anywhere

// $_GET is an assoc array where the keys come from the name attribute of the input, and the values are
// what the user typed in
// $_POST is the same as $_GET, but for data sent via POST requests instead

// Use POST for anything that contains remotely sensitive info (even just someone's email address)
// If your site uses HTTPS data sent via post is encrypted
// Use GET for things like search forms, anything where it would be handy for someone to be able to copy the URL

// Really important when dealing with form data that you make sure the data exists before you access it
// Otherwise you'll get undefined array key errors when first loading the page
if (isset($_POST['submitted'])) {
    echo 'Your username is ' . $_POST['username'] . 'and your password is' . $_POST['password'];
}

?>

<form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" />

    <label for="password">Password</label>
    <input type="password" id="password" name="password" />

    <input type="submit" name="submitted" value="Login"/>
</form>