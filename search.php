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
      <div class="left_item"><h1>Search</h1></div>
    </header>


    <!-- search bar -->
      <form action="search_action.php" method="POST">
        <div class="search_bar">
        <input  id="text_input" type="text" placeholder="Search items" name="keyword">
        <div class="right_button">
        <button id="button" type="submit" name="button"><img src="pics/search_icon.png" alt="click to search"></button>
        </div>
        </div>
      </form>

<?php include 'footer.php' ?>




  </body>
</html>
