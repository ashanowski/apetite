<!-- Login -->
<form action="php/login.php" method="post" class="_form" id="login-form">
  <h2>Zaloguj się</h2>

  <div class="group">
    <input type="text"
            placeholder="Login"
            name="login"
            id="login">
    <span class="highlight"></span>
    <span class="bar"></span>
  </div>
  <div class="group">
    <input type="password"
            placeholder="Hasło"
            name="password"
            id="password">
    <span class="highlight"></span>
    <span class="bar"></span>
  </div>
  <button type="submit">Zaloguj się</button>
</form>
<!-- End Login -->
<?php if(isset($_SESSION['register_success'])): ?>
  <div>Rejestracja udana! Możesz się zalogować.</div>
  <?php unset($_SESSION['register_success']) ?>
<?php elseif(isset($_SESSION['error'])): ?>
  <div><?php echo $_SESSION['error'] ?></div>
  <?php unset($_SESSION['error']) ?>
<?php endif; ?>