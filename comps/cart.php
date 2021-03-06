<?php
  require_once "php/connect.php";
  $connection = @new mysqli($host, $db_user, $db_pass, $db_name);

  $inventory = array();

  if ($connection->connect_errno!=0)
  {
      echo "Error: ".$connection->connect_errno;
  }
  else
  {
      $sql = "SELECT * FROM inventory";
      $result = $connection->query($sql);
      if ($result->num_rows > 0) 
      {
          while($row = $result->fetch_assoc()) 
          {
              array_push($inventory, $row);
          }
      }
      else 
      {
          echo "0 results";
      }
  }
  $connection->close();

  /*
    * ------- BASKET ADDING ITEMS
    */

  if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
  }

  if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {

      $found = False;

      foreach ($_SESSION['cart'] as $item => $value) {
          if ($_POST['id'] == $value->id) {
              $value->quantity += (integer) $_POST['quantity'];
              $found = True;
          }
      }

      if (!$found){
          $order = (object) [
                  'id' => $_POST['id'],
                  'quantity' => $_POST['quantity']
          ];
          array_push($_SESSION['cart'], $order);
      } 


  }
  function printShop($name, $weight, $price, $image, $id)
  {
      echo "<div class='item animated flipInX'>
              <div class='item-name'>
                  <h2>$name</h2>
              </div>
  
              <div class='item-details'>
                  <div class='item-image'>
                      <img src='assets/inv_images/$image' width='200' alt=''>
                  </div>
                  <div class='item-desc'>
                      <p class='item-weight'>$weight kg</p>
                      <h4 class='item-price'>$price.00zł</h4>
                      <form method='post'>
                          <input type='hidden' name='id' value='$id'>
                          <label for='quantity'>Ilość sztuk:</label>
                          <input class='item-quantity' type='number' name='quantity' value=1> 
                          <button class='item-add'>Dodaj do koszyka</button>
                      </form>               
                  </div>
              </div>
          </div>";
  }
  ?>
<div class="inventory">
  <section class="cart">
      <br>
      <?php
      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          echo '<h1>Koszyk:</h1>';
          ?>
          <table class="minimalistBlack">
              <thead>
                  <tr>
                      <th>Nazwa</th>
                      <th>Ilość</th>
                      <th>Cena za sztukę</th>
                      <th>Cena za całość</th>
                      <th>Usuń z koszyka</th>
                  </tr>
              </thead>
              <tbody>
          <?php
      $sum_price = 0;
      foreach($inventory as $item)
          {
              foreach($_SESSION['cart'] as $cart_item => $cart_value) {
                  if($cart_value->id == $item['id'])
                  {
                      $price_quant = (float)$item['price'] * (integer)$cart_value->quantity;
                      $sum_price += $price_quant;
                      ?>
                      <tr>
                          <td><?php echo $item['name']?></td>
                          <td><?php echo $cart_value->quantity?></td>
                          <td><?php echo $item['price']?>.00 zł</td>
                          <td><?php echo $price_quant;?>.00 zł</td>
                          <td>
                              <form method='post' action="php/removeItem.php">
                              <input type='hidden' name='id' value="<?php echo $item['id']?>">
                              <button>Usuń</button>
                              </form>     
                          </td>
                      </tr>
                      <?php
                  }
              }
          }
          ?>
          </tbody>
          <tfoot>
              <tr>
                  <td>Suma</td>
                  <td></td>
                  <td></td>
                  <td><?php echo $sum_price; ?>.00 zł</td>
                  <td><a href="php/clearCart.php">Wyczyść koszyk</a></td>
              </tr>
          </tfoot>
          </table>
          <?php

      } else {
          echo '<h3>Koszyk jest pusty</h3>';
      }
      ?>
</section>
<br>
<?php if(count($_SESSION['cart']) > 0) {
    echo '<button class="item-add">Przejdź do płatności</button>';
} ?>