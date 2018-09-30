

<?php

    // Start the session
    session_start();

    // Defines username and password. Retrieve however you like,
    $username = "password2017";
    $password = "password2017";

    // Error message
    $error = "";

    // Checks to see if the user is already logged in. If so, refirect to correct page.
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $error = "success";
        header('Location: success.php');
    } 
        
    // Checks to see if the username and password have been entered.
    // If so and are equal to the username and password defined above, log them in.
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == $username && $_POST['password'] == $password) {
            $_SESSION['loggedIn'] = true;
            header('Location: index.php');
        } else {
            $_SESSION['loggedIn'] = false;
		header('Location: index.html');

            $error = "Invalid username and password!";
        }
    }
?>

