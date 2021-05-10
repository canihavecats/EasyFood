<?php include 'header.php' ?>


<!--  header -->
<header>
  <div class="header_column">
      <div class="left_item">
        <a href="search.php">
          <img src="pics/back_icon.png" alt="return">
        </a>
    </div>
  </div>
</header>


<!-- photo grid based on the search -->
<div class="row">
<?php
//Make a query based on the input word
if(isset($_POST['button'])) {
  $search = mysqli_real_escape_string($link, $_POST['keyword']); //prevent injections
  $sql = "SELECT ProductName, ProductID, photo, Price FROM product WHERE ProductName LIKE '%$search%' OR Category LIKE '%$search%'";
  $result = mysqli_query($link, $sql);
  $queryResult = mysqli_num_rows($result);

  if ($queryResult > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='column'>
        <img src='".$row['photo']."' style='width:100%'>
        <form action='index_action.php' method='POST'>
          <div class='item_info'>
            <input id='first_input' type='text' name='keyword' value='".$row['ProductName']."' disabled>
            <input id='second_input' type='text' name='productid' value='".$row['ProductID']."'>
            <input id='third_input' type='text' name='price' value='$".$row['Price']."' disabled>
            <div class='add_button'>
                <button type='submit' name='button'>Select</button>
            </div>
          </div>
        </form>
      </div>";

    }
  } else {
    echo "No results";
  }
}
mysqli_close($link);
?>
</div>

<?php include 'footer.php' ?>

</body>
