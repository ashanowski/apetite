<?php
session_start();
if (!isset($_SESSION['logged'])){
  header('Location login.php');
}
?>
<?php include("comps/head.html") ?>
<body>
  <header>
    <!-- Navbar -->
    <?php include("comps/navbar.php") ?>

    <section>
      <h1>Logowanie powiodło się! Gratulacje!!!!</h1>
    </section>


  <!-- Footer -->
  <?php include("comps/footer.php") ?>
</body>
</html>