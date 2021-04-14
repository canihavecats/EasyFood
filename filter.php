<?php include 'header.php' ?>

  <body>
    <!-- IDEA: header -->
    <header>
      <div class="header_column">
          <div class="left_item">
            <a href="index.php">
              <img src="pics/icons/back_icon.png" alt="return">
            </a>
        </div>
      </div>
      <div class="left_item"><h1>Filter</h1></div>
    </header>

    <!-- IDEA: list of items -->
    <div class="cart_items">
    <?php
    $sql = "SELECT DISTINCT Category FROM product";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='item_row'>
              <form action='filter_action.php' method='POST'>
              <button id=left_filtertitem name='keyword'>".$row['Category']."</button>
              </form>
              </div>";
    }
    }
    ?>
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
