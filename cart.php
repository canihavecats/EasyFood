<?php include 'header.php' ?>



  <body>
    <!-- IDEA: header
    -->
    <header>
      <div class="header_column">
          <div class="left_item">
            <a href="index.php">
              <img src="pics/icons/back_icon.png" alt="return">
            </a>
        </div>
      </div>
      <div class="left_item"><h1>Shopping cart</h1></div>
    </header>

    <!-- IDEA: cart items -->
    <div class="cart_items">
    <?php
    $sql = "SELECT ProductName FROM shopping_cart";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='item_row'>
              <p id=left_cartitem>".$row['ProductName']."</p>
                <div id='right_cartitem'>
                  <button id='delete_button' type='submit' name='button'>
                    <img src='pics/icons/delete_icon.png'>
                  </button>
                </div>
              </div>";
    }
    }
    ?>
  </div>

    <!-- IDEA: order button   <div class="order_button">
        <button type="button" name="button">Order</button>
      </div>-->

      <div class="order_button">
          <button type="button" name="button">Order</button>
      </div>




    <!-- IDEA: footer navbar -->
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



</html>
