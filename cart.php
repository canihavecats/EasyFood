<?php include 'header.php' ?>


  <body>
    <!--  header -->
    <header>
      <div class="header_column">
          <div class="left_item">
            <a href="index.php">
              <img src="pics/back_icon.png" alt="return">
            </a>
        </div>
      </div>
      <div class="left_item"><h1>Shopping cart</h1></div>
    </header>


    <!-- cart items -->
    <?php
    $sql = "SELECT ProductName, ProductID, Price FROM shopping_cart";
    $result = mysqli_query($link, $sql);
    $queryResult = mysqli_num_rows($result);
    // returns items based on the query
    if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='item_row'>
              <form action='cart_action.php' method='POST' name='cart_form'>
                <div class='cart_container'>
                  <label>Product:</label>
                  <input id='shopping_cart_input_first'type='text' name='productname' value='".$row['ProductName']."' disabled>
                  <label>Product number:</label>
                  <input id='shopping_cart_input_second'type='text' name='productid' value='".$row['ProductID']."' readonly>
                  <label>Price:</label>
                  <input id='shopping_cart_input_third' type='text' name='price' value='".$row['Price']."' disabled>
                  <button class='delete_button' type='submit' name='deletebutton'>Delete</button>
                </div>
              </form>
            </div>";
    }
    }
    mysqli_close($link);
    ?>

    <!-- Submit button-->
    <form action='order_action.php' method='POST'>
      <div class='submit_button'>
        <button type='submit' name='submitbutton'>Order</button>
      </div>
    </form>


<?php include 'footer.php' ?>

  </body>
</html>
