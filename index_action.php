<?php include 'header.php' ?>


  <body>
    <!-- header -->
    <header>
      <div class="header_column">
        <div class="left_item"><h1>EasyFood</h1></div>
          <div class="right_item">
            <a href="user.php">
              <img src="pics/user_icon.png" alt="">
            </a>
        </div>
      </div>
    </header>


    <!-- photogrid -->
    <?php
    //prompt message to press the x button
      function msg() {
      echo "Press X to return";
    }
    //inserts items to the shopping cart
    $sql = "INSERT INTO shopping_cart (ProductID, ProductName, Price) SELECT ProductID, ProductName, Price FROM product WHERE ProductID = '".$_POST['productid']."'";
    $result = mysqli_query($link, $sql);
    msg();


    // if successfully updated.
    if($result){
    echo "<div class='user_action_banner'>
            <h1>Item is added to your cart</h1>
            <a href='index.php'>
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
</html>
