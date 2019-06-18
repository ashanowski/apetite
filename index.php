<?php
session_start();
if (!isset($_SESSION['logged'])) {
  $_SESSION['logged'] = false;
}

?>
<?php include("comps/head.html") ?>
<body>
  <header>
    <!-- Navbar -->
    <?php include("comps/navbar.php") ?>

    <!-- Showcase -->
    <section class="showcase">
      <div class="content">
        <?php include("comps/logo.php") ?>
      </div>
    </section>
  </header>


  <?php include("comps/footer.php") ?>
</body>
</html>