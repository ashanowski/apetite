<nav>
  <ul>
    <li><a href="index.php">Strona główna</a></li>
    <li><a href="#">Sklep</a></li>
    <li><a href="#">O nas</a></li>
    <li><a href="#">Kontakt</a></li>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
    <li><a href="#">Wyloguj się</a></li>
    <?php else: ?>
    <li><a href="login.php">Zaloguj</a></li>
    <li><a href="register.php">Zarejestruj się</a></li>
    <?php endif; ?>
  </ul>
</nav>