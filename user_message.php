<?php session_start(); ?>
<?php include("comps/head.html") ?>
<body>
  <header>
    <!-- Navbar -->
    <?php include("comps/navbar.php") ?>
  </header>

  <div class="about">
      <div class="intro">
          <h2>Twoja wiadomość została przesłana</h2>
          <p>Dziekujemy za twoją wiadomość. Ktoś z naszego zespołu wkrótce się z tobą skontaktuje.</p>
          <div class="cat">
            <img src="assets/cat.gif" alt="cat">
          </div>
      </div>

  </div>

  <?php include("comps/footer.php") ?>
</body>
</html>