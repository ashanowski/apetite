<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/footer.css">

  <link href="https://fonts.googleapis.com/css?family=Muli|Shadows+Into+Light&display=swap" rel="stylesheet"> 
  <script src="scripts/showLogin.js"></script>
  <title>Apetite - Strona główna</title>
</head>
<body>
  <header>

    <?php include("comps/navbar.php") ?>

    <section class="showcase">
      <div class="content">
        <div id="info">
          <div class="title">Apetite</div>
          <div class="desc">Najlepsze zwierzęce jedzenie</div>
        </div>

        <form action="post" class="login-form" id="login-form">
          <h2>Zaloguj się</h2>
          <input type="text" placeholder="Login" name="login" id="login">
          <input type="password" placeholder="Hasło" name="password" id="password">
          <button type="submit">Zaloguj się</button>
        </form>
      </div>
    </section>
  </header>

  <section class="services">

  </section>

  <?php include("comps/footer.php") ?>
</body>
</html>