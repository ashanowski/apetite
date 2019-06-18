<!-- Register -->
<form action="php/register.php" method="post" class="_form" id="register-form">
  <h2 class="animated fadeInDown">Zarejestruj się</h2>
  
  <div class="group animated fadeInRight">
    <input type="email"
            placeholder="E-mail"
            name="email"
            id="email">
    <span class="highlight"></span>
    <span class="bar"></span>
  </div>

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

  <div class="group animated fadeInLeft">
    <input type="password"
            placeholder="Powtórz hasło"
            name="password_repeat"
            id="password_repeat">
    <span class="highlight"></span>
    <span class="bar"></span>
  </div>

  <button type="submit" class="animated fadeInUp">Zarejestruj</button>
</form>
<!-- End Register -->

<?php if(isset($_SESSION['error'])): ?>
  <div><?php echo $_SESSION['error'] ?></div>
  <?php unset($_SESSION['error']) ?>
<?php endif; ?>