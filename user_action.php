<?php include 'header.php' ?>


<?php
// validating email
if (isset($_POST['button'])){
  $value = $_POST['email'];
  if (filter_var($value, FILTER_VALIDATE_EMAIL) == true) {
  "";
  } else {
    header("Location: user.php");
  }
}
// SQL Query and removing whitespace
$sql = "UPDATE userinfo SET Username = '".trim($_POST['username'])."', Email = '".$_POST['email']."' ";
$result = mysqli_query($link, $sql);


// if successfully updated.
if($result){
echo "<div class='user_action_banner'>
        <h1>Information is updated</h1>
        <a href='user.php'>
          <img src='pics/delete_icon.svg' alt='close'>
        </a>
      </div>";

}

else {
echo "ERROR";
}
?>

<?php include 'footer.php' ?>

</body>
