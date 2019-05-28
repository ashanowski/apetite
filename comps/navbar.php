<nav>
  <ul>
    <li><a href="index.php">Strona główna</a></li>
    <li><a href="shop.php">Sklep</a></li>
    <li><a href="#">O nas</a></li>
    <li><a href="#">Kontakt</a></li>
    <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true): ?>
    <li><a>Konto<span class="arrow">&#x25BC;</span></a>
      <ul class="submenu">
        <li><a href="#">Ustawienia</a></li>
        <li><a href="php/logout.php">Wyloguj się</a></li>
      </ul>
    </li>
    <?php else: ?>
    <li><a href="login.php" id="flex-end">Zaloguj</a></li>
    <?php endif; ?>
  </ul>
</nav>