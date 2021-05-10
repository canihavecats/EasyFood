<?php include 'header.php' ?>

  <body>
    <!-- header -->
    <header>
      <div class="header_column">
          <div class="left_item">
            <a href="index.php">
              <img src="pics/back_icon.png" alt="return">
            </a>
        </div>
      </div>
      <div class="left_item"><h1>Filter</h1></div>
    </header>

    <!-- list of items -->
    <div class="filter_items">
    <?php
    $sql = "SELECT DISTINCT Category FROM product";
    $result = mysqli_query($link, $sql);
    $queryResult = mysqli_num_rows($result);
    // returns items based on the query
    if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='filter_item_row'>
              <form id='filterhover' action='filter_action.php' method='POST'>
                <input type='submit' name='filterprod' value='".$row['Category']."'>
              </form>
            </div>";
    }
    }
    ?>
  </div>



<?php include 'footer.php' ?>

  </body>
</html>
