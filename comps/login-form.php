<!-- Login -->
<form action="php/login.php" method="post" class="_form" id="login-form">
  <h2 class="form-title animated fadeInDown">Zaloguj się</h2>
  <div class="group animated fadeInLeft">
    <input type="text"
            placeholder="Login"
            name="login"
            id="login">
    <span class="highlight"></span>
    <span class="bar"></span>
  </div>
  <div class="group animated fadeInRight">
    <input type="password"
            placeholder="Hasło"
            name="password"
            id="password">
    <span class="highlight"></span>
    <span class="bar"></span>
  </div>
  <button type="submit" class="animated fadeInUp">Zaloguj się</button>
  <a href="register.php" id="register-link" class="animated fadeInUp">Nie masz jeszcze konta? Zarejestruj się!</a>
</form>
<!-- End Login -->
<?php if(isset($_SESSION['register_success'])): ?>
  <div>Rejestracja udana! Możesz się zalogować.</div>
  <?php unset($_SESSION['register_success']) ?>
<?php elseif(isset($_SESSION['error'])): ?>
  <div><?php echo $_SESSION['error'] ?></div>
  <?php unset($_SESSION['error']) ?>
<?php endif; ?>