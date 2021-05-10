<?php
  session_start();

  // If the user is logged in, delete the session data and destroy the session
  if (isset($_SESSION['UserID'])) {

    // Delete the session data by clearing the $_SESSION array
    $_SESSION = array();

    // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }

    // Destroy the session
    session_destroy();
  }

  // Delete the userid, username and city cookies by setting their expirations to an hour ago (3600 secs)
  setcookie('UserID', '', time() - 3600);
  setcookie('Username', '', time() - 3600);
  setcookie('Email', '', time() - 3600);

  // Redirect to the login page
  header("Location: login.php");
?>
