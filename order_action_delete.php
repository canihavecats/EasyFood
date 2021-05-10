<?php include 'header.php' ?>


<?php
//Delete all data from shopping cart
$sql = "TRUNCATE TABLE shopping_cart";

if (mysqli_query($link, $sql)) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
?>

<?php
//Delete all data from order table
$sql = "TRUNCATE TABLE orders";

if (mysqli_query($link, $sql)) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
} header("Location: index.php");
mysqli_close($link);
?>
