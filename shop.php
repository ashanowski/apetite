<?php session_start(); ?>
<?php include("comps/head.html") ?>
<body>
  <header>
    <!-- Navbar -->
    <?php include("comps/navbar.php") ?>
     
    <section class="showcase">
      <div>
        <?php include("comps/inventory.php") ?>
      </div>
    </section>

  </header>
  <?php include("comps/footer.php") ?>
</body>
</html>