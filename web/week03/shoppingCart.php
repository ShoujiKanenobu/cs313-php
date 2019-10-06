<?php
   session_start();
   
   if(empty($_SESSION['cart']))
   {
      $_SESSION['cart'] = array();
   }
   
   $cart = (isset($_SESSION['cart']) ? $_SESSION['cart'] : '');
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
         <li><a href="shopping.html"> <b> Shopping </b> </a></li>
         <li><a class = "active">View Cart</a></li>
      </ul>
   </header>
   <body>
      <div class="main">
         <h2>Shopping Cart</h2>
         <?php
            if(is_array($cart)) {
            foreach ($cart as $item) {
            echo $cart[$item] . "<br>";
            }
            }
            ?>
      </div>
   </body>
</html>