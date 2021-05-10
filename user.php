<?php include 'header.php' ?>


  <body>
    <!-- header -->
    <header>
      <div class="header_column">
          <div class="left_item">
            <a href="index.php">
              <img src="pics/back_icon.png" alt="return">
            </a>
        </div>
        <div class='right_item'>
          <a href='logout.php'>Log out</a>
        </div>
      </div>
      <div class="left_item"><h1>Account</h1></div>
    </header>


  <?php
    session_start();

    if (!isset($_SESSION['UserID'])) {
      if (isset($_COOKIE['UserID'])) {
        $_SESSION['UserID'] = $_COOKIE['UserID'];
      }
    }
  ?>

    <!-- User input elements -->
    <?php
    $sql = "SELECT Username, Email FROM userinfo WHERE UserID = '".$_SESSION['UserID']."'";
    $result = mysqli_query($link, $sql);
    $queryResult = mysqli_num_rows($result);
    // returns items based on the query
    if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='name_bar'>
        <form class='user_name_bar' action='user_action.php' method='POST'>
          <p>Username:</p>
          <input type='text' name='username' value='".$row['Username']."' required>
          <p>Email:</p>
          <input type='text' name='email' value='".$row['Email']."' required>
          <div class='submit_button'>
              <button type='submit' name='button'>Save</button>
          </div>
        </form>
      </div>";
    }
    }
    mysqli_close($link);
    ?>

<?php include 'footer.php' ?>

  </body>
</html>
