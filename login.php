
  <?php
  require_once('dbc_login.php');

  // Start a session
  session_start();

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['UserID']))
  {
    if (isset($_POST['sign_in_button'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $username = mysqli_real_escape_string($dbc, trim($_POST['uname']));
      $password = mysqli_real_escape_string($dbc, trim($_POST['pword']));

      if (!empty($username) && !empty($password)) {
        // Fetch the userid, username, password, and city from the database
        $query = "SELECT UserID, Username FROM userinfo WHERE Username = '$username' AND Password = SHA('$password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The login is OK. Set the userid, username, and city session variables. Set the cookies. Redirect to the home page
          $row = mysqli_fetch_array($data);

          $_SESSION['UserID'] = $row['UserID'];
          $_SESSION['Username'] = $row['Username'];

          setcookie('userid', $row['userid'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days

          // Check this nice way to get the URL of the app's home page
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username or password are incorrect so set an error message
          $error_msg = 'Incorrect username/password. Please try again.';
        }
      }
    }
  }
?>
<?php include 'header.php' ?>

<body>

<?php
  // If the session data is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['UserID'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>

<form class="login_form" action="login.php" method="POST">
  <div class="login_column_header">
    <img src="pics/user_icon.svg">
      <h2>Login</h2>
    </div>
    <div class="login_container">
      <label for="uname">Username:</label>
      <input type="text" name="uname" required>

      <label for="uname">Password:</label>
      <input type="password" name="pword" required>

      <button type="submit" name="sign_in_button">SIGN IN</button>
    </div>
  </form>
  <a  class="login_a" href="signup.php">Create account</a>

<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['Username'] . '.</p>');
  }
?>

</body>



</html>
