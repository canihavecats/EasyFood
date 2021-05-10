<?php include 'header.php' ?>

    <!-- check the session data for logged in users -->
<?php
//start session
  session_start();


  if (!isset($_SESSION['UserID'])) {
    if (isset($_COOKIE['UserID']) && isset($_COOKIE['Username'])) {
      $_SESSION['UserID'] = $_COOKIE['UserID'];
      $_SESSION['Username'] = $_COOKIE['Username'];
    }
  }
?>

<body>

    <!-- Show header items if user is logged in and otherwise show login or sign up links -->
    <?php
    if (isset($_SESSION['UserID'])) {
      echo "<header>
              <div class='header_column'>
                <div class='left_item'><h1>EasyFood</h1></div>
                  <div class='right_item'>
                    <a href='user.php'>
                      <img src='pics/user_icon.png'>
                    </a>
                  </div>
                </div>
              </header>";
            } else {
              echo "Hi!<br>Sign Up if you don't have an account.<br>Login if you already have an account.<br>";
              echo '<a href="login.php">Log In</a><br>';
              echo '<a href="signup.php">Sign Up</a>';
            }
    ?>
    <!-- Show products if user is logged in-->
    <div class="row">
    <?php
    if (isset($_SESSION['UserID'])) {
    $sql = "SELECT ProductName, ProductID, photo, Price FROM product";
    $result = mysqli_query($link, $sql);
    $queryResult = mysqli_num_rows($result);
    // returns items based on the query
    if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "
      <div class='column'>
        <img src='".$row['photo']."' style='width:100%'>
        <form action='index_action.php' method='POST'>
          <div class='item_info'>
            <input id='first_input' type='text' name='keyword' value='".$row['ProductName']."' disabled>
            <input id='second_input' type='text' name='productid' value='".$row['ProductID']."' readonly>
            <input id='third_input' type='text' name='price' value='$".$row['Price']."' disabled>
            <div class='add_button'>
                <button type='submit' name='button'>Select</button>
            </div>
          </div>
        </form>
      </div>";
    }
    }
  }
  ?>
</div>
  <!-- include footer navigation bar if user is logged in-->
  <?php
if (isset($_SESSION['UserID'])) {
  include 'footer.php';
        }
    ?>




  </body>
</html>
