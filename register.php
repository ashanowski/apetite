<?php session_start(); ?>
<?php include("comps/head.html") ?>
<body>
  <header>
    <!-- Navbar -->
    <?php include("comps/navbar.php") ?>

    <!-- Showcase -->
    <section class="showcase">
      <div class="content">
        <?php include("comps/register-form.php") ?>
      </div>
    </section>
  </header>
  <?php include("comps/footer.php") ?>
</body>
</html>