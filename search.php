
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyFood</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  </head>

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
      <div class="left_item"><h1>Search</h1></div>
    </header>

    <!-- IDEA: search bar -->

    <div class="search_bar">
      <form action="search_action.php" method="POST">
        <input  id="text_input" type="text" placeholder="Search items" name="keyword">
        <button id="button" type="submit" name="button"><img src="pics/icons/search_icon.png" alt="click to search"></button>
      </form>
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
