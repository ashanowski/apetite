<nav>
  <ul>
    <li><a href="index.php">Strona główna</a></li>
    <li><a href="shop.php">Sklep</a></li>
    <li><a href="about.php">O nas</a></li>
    <li><a href="contact.php">Kontakt</a></li>
    <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true): ?>
    <li><a>Konto<span class="arrow">&#x25BC;</span></a>
      <ul class="submenu">
        <li><a href="cart.php">Koszyk: <?php
        if (!isset($_SESSION['sum_quantity'])) {
          $_SESSION['sum_quantity'] = 0;
          echo $_SESSION['sum_quantity'];
        } else {
          echo $_SESSION['sum_quantity'];
        }?></a></li>
        <li><a href="php/logout.php">Wyloguj się</a></li>
      </ul>
    </li>
    <?php else: ?>
    <li><a href="login.php" id="flex-end">Zaloguj</a></li>
    <?php endif; ?>
  </ul>
</nav>