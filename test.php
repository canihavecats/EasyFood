<?php
if(isset($_POST['button'])) {
  $search = mysqli_real_escape_string($conn, $_POST['keyword']); //prevent injections
  $sql = "SELECT ProductName, photo FROM product WHERE ProductName LIKE '%$search%' OR Category LIKE '%$search%'";
  $result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);

  if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='column'>
        <img src='".$row['photo']."' style='width:100%'>
        <p>".$row['ProductName']."</p>
      </div>";

    }
  } else {
    echo "No results";
  }
}
?>

<?php
$sql = "SELECT ProductID FROM Shopping_cart";
$result = mysqli_query($conn, $sql);
$queryResult = mysqli_num_rows($result);

if ($queryResult > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='cart_items'>
      <div id='left_cartitem'><p>".$row['ProductID']."</p></div>
      <div id='right_cartitem'><img src='pics/icons/delete_icon.png'>
      </div>";
  }
}


?>

<div class="cart_items">
  <div id="left_cartitem"><p>placeholder</p></div>
    <div id="right_cartitem">
        <img src="pics/icons/delete_icon.png" alt="delete">
  </div>
</div>
