<?php include 'header.php' ?>


<?php
//delete item from the shopping cart
if (isset($_POST['deletebutton'])) {
$sql = "DELETE FROM shopping_cart WHERE ProductID = '".$_POST['productid']."'";
$result = mysqli_query($link, $sql);


// if successfully updated.
if($result){
echo "<div class='user_action_banner'>
        <h1>Information is updated</h1>
        <a href='cart.php'>
          <img src='pics/delete_icon.svg' alt='close'>
        </a>
      </div>";

}

else {
echo "ERROR";
}
}
?>

<?php include 'footer.php' ?>

</body>
