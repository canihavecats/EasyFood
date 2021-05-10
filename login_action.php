<?php include 'header.php' ?>

<body>

<?php
$sql = "SELECT Username, Password FROM userinfo";
$result = mysqli_query($link, $sql);
// check if entered username and password match the username and password in database
if($_POST['uname'] == $sql['Username'] and $_POST['pword'] == $sql['Password']) {
  header("Location: index.php");
} else {
  header("Location: login.php");
}
 ?>

</body>



</html>
