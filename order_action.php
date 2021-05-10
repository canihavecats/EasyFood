<?php include 'header.php' ?>


<body>
  <!-- header -->
  <header>
    <div class="header_column">
        <div class="left_item">
          <form class="" action="order_action_delete.php" method="POST">
            <button id="order_action_button" type="submit" name="button"><img src="pics/delete_icon.png" alt="return"></button>
          </form>
      </div>
    </div>
    <div class='login_column_header'>
            <img src='pics/check_icon.svg'>
            <h2>Your order has been placed.</h2>
          </div>
    <div class="order_summary_header"><h3>Order Summary</h3></div>
  </header>


  <!-- Inserts shopping cart items to the orders table -->
  <?php
  $sql = "INSERT INTO orders (ProductID, ProductName, Price) SELECT * FROM shopping_cart";

  if (mysqli_query($link, $sql)) {
    echo "";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
  }
  ?>


  <!-- order summary box -->
  <div class="order_summary_box">
  <?php
  $sql = "SELECT ProductName, ProductID FROM orders";
  $result = mysqli_query($link, $sql);
  $queryResult = mysqli_num_rows($result);

  if ($queryResult > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='order_detail_box'>
            <ul>
              <label>Product:</label>
              <li>".$row['ProductName']."</li>
              <label>Product number:</label>
              <li>".$row['ProductID']."</li>
            </ul>
          </div>";
  }
  }
  mysqli_close($link);
  ?>
  </div>


</body>
</html>
