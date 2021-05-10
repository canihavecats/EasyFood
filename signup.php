<?php include 'header.php' ?>



<body>

  <?php
/* This php block will only be executed after the user submits the signup data
 by clicking the sign-up button
*/
session_start();
require_once('dbc_login.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['signup_button'])) {
    // Get the signup data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['uname'])); //mysqli_real_escape_string is used to enhance security
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['pword']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['pword_second']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));


    if (!empty($username) && !empty($password1) && !empty($password2) && !empty($email) && ($password1 == $password2)) {
      // Check that the provided username does not yet exist in the database
      $query = "SELECT * FROM userinfo WHERE Username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {

      	$query = "INSERT INTO userinfo (Username, Password, Email) VALUES ('$username', SHA('$password1'), '$email')";
        mysqli_query($dbc, $query);

        $query = "SELECT UserID FROM userinfo WHERE Username = '$username'";
        $data = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($data);

        // Set the session variables to hold the userid, username, and city of the just created account. Set also the cookies.
        $_SESSION['UserID'] = $row['UserID'];
        $_SESSION['Username'] = $username;
        $_SESSION['Email'] = $email;
        setcookie('UserID', $row['UserID'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
        setcookie('Username', $username, time() + (60 * 60 * 24 * 30));  // expires in 30 days
        setcookie('Email', $email, time() + (60 * 60 * 24 * 30));  // expires in 30 days

        mysqli_close($dbc);

        // Confirm success with the user
        echo 'Thanks for signing up, '. $username .'!</br>';
        echo '<p>Your new account has been successfully created. <a href="index.php">Open application</a>.</p>';


        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo 'An account already exists for this username.';
        $username = "";
      }
    }
  }

  mysqli_close($dbc);
?>

        <form class="login_form" action="signup.php" method="POST">
        <div class="login_column_header">
          <h2>Sign up</h2>
        </div>
        <div class="login_container">
            <label for="uname">Username:</label>
            <input type="text" name="uname" required>

            <label for="uname">Email:</label>
            <input type="text" name="email" required>

            <label for="uname">Password:</label>
            <input type="password" name="pword" required>

            <label for="uname">Retype the password:</label>
            <input type="password" name="pword_second" required>

            <button type="submit" name="signup_button">SIGN UP</button>
        </div>
        </form>
        <a  class="login_a" href="login.php">Go back</a>


</body>



</html>
