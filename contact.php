<?php session_start(); ?>
<?php include("comps/head.html") ?>
<body>
  <header>
    <!-- Navbar -->
    <?php include("comps/navbar.php") ?>
  </header>

  <div class="about">
    <div class="intro">
        <h2>Skontaktuj się z nami</h2>
        <div class="contact">
            <h4>Siedziba we Wrocławiu</h4>
            <p>ul. Kiełczowska 74</p>
            <p>51-315 Wrocław</p>
            <p>nr. tel: +48 666 666 666</p>
            <p>adres e-mail: contact@apetite.pl</p>
        </div>
        <div class="contact">
            <h4>Oddział w Sosnowcu</h4>
            <p>ul. Modrzejowska 3</p>
            <p>41-200 Sosnowiec</p>
            <p>nr. tel: +48 999 999 999</p>
            <p>contact_sos@apetite.pl</p>
        </div>

        <div id="map"></div>

        <div class="contact_form">
            <h4>Wyślij nam wiadomość</h4>
            <form action="user_message.php">
            <input type="text" id="fname" name="firstname" placeholder="Imię...">
            <input type="text" id="lname" name="lastname" placeholder="Nazwisko...">
            <input type="text" id="mail" name="mail" placeholder="Adres e-mail...">
            <input type="text" id="number" name="number" placeholder="Nr. telefonu">
            <textarea id="subject" name="subject" placeholder="Napisz do nas..."></textarea>
            <input type="submit" value="Wyślij">
            </form>
        </div>
    </div>
  </div>

<script type="text/javascript" src="scripts/googleMap.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2-Qrb-f-V59rT-vZoDDWYQrT28HjTdY8&callback=initMap">
</script>

  
  <?php include("comps/footer.php") ?>
</body>
</html>