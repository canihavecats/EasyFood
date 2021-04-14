<?php include 'header.php' ?>

<header>
  <div class="header_column">
      <div class="left_item">
        <a href="filter.php">
          <img src="pics/icons/back_icon.png" alt="return">
        </a>
    </div>
  </div>
</header>

<div class="row">
<?php
if(isset($_POST['button'])) {
  $search = mysqli_real_escape_string($conn, $_POST['keyword']); //prevent injections
  $sql = "SELECT ProductName, photo FROM product WHERE Category LIKE $search";
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
</div>

<footer>
  <div class="footer_nav">
    <div id="menu" class="icon">
      <a href="filter.php">
        <img src="pics/icons/menu_icon.png" alt="Menu">
      </a>
    </div>
    <div id="search" class="icon">
      <a href="search.php">
        <img src="pics/icons/search_icon.png" alt="Search">
      </a>
    </div>
    <div id="cart" class="icon">
      <a href="cart.php">
        <img src="pics/icons/cart_icon.png" alt="Cart">
      </a>
    </div>
  </div>
</footer>

</body>
