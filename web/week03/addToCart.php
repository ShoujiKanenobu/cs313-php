<?php
session_start();

if(empty($_SESSION['cart']))
{
	$_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET[id]);

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>PHP Shopping Cart</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="shoppingCartStyle.css">
   </head>
   <header>
      <ul>
         <li><a class = "active">Shopping</a></li>
         <li><a href="shoppingCart.php"> <b>View Cart </b> </a></li>
      </ul>
   </header>
   <body>
      <div class="main">
         <form action="addToCard.php" method="POST">
            <table>
               <tr>
                  <td>Teddy Bear</td>
                  <td> <a href="addToCart.php?id=1" class="hbutton">Add to Cart</a></td>
               </tr>
               <tr>
                  <td>Lego Set</td>
                  <td> <a href="addToCart.php?id=2" class="hbutton">Add to Cart</a></td>
               </tr>
               <tr>
                  <td>Puzzle</td>
                  <td> <a href="addToCart.php?id=3" class="hbutton">Add to Cart</a> </td>
               </tr>
               <tr>
                  <td>Action Figures</td>
                  <td> <a href="addToCart.php?id=4" class="hbutton">Add to Cart</a> </td>
               </tr>
            </table>
         </form>
      </div>
   </body>
</html>