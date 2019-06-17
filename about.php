<?php session_start(); ?>
<?php include("comps/head.html") ?>
<body>
  <header>
    <!-- Navbar -->
    <?php include("comps/navbar.php") ?>
  </header>
  
 <div class="about">
    <div class="intro">
        <h2>O nas</h2>
        <h4>Założyciele</h4>
        <p>Sklep Apetite został załorzony przez 2 studentów Inżynierii Systemów. <br> Na 6. semsetrze zorientowali się, że oprócz pasji do web designu 
                łączyła ich też miłość do karm dla zwierząt.
        </p>
        <div class="intro_photo">
            <div class="fund_photo">
                <figure>
                    <img src="assets/jan-kasprzak.jpg" alt="Jan Kasprzak" class="image">
                    <figcaption>Jan Kasprzak, Co-founder</figcaption>
                </figure>
            </div>  
            <div class="fund_photo">
                <figure>
                    <img src="assets/konrad-baran.jpg" alt="Konrad Baran" class="image">
                    <figcaption>Konrad Baran, Co-founder</figcaption>
                </figure>
            </div>
        </div>
        <div class="quotes">
            <p class="quote">"Naszą misją jest dostarczenie naszym klientom najwyższej jakości karmy dla ich zwierzaków.
                Jestem dumnym właścicielem 2 psów i 13 kotów, codziennie staram się zapewnić im jak najlepiej dobraną dietę.
                Każdy miłośnik zwierząt wie, że dobrze opiekuje się swoimi pupilami kiedy są zdrowe, a ich sierść błyszczy."</p>
            <p class="person"> - Konrad Baran</p>
        </div>
        <div class="quotes">
            <p class="quote">"Nie lubię zwierząt, ale lubię pieniądze."</p>
            <p class="person"> - Jan Kasprzak</p>
        </div>
        <h4>Zespół</h4>
        <div class="intro_photo">
            <img src="assets/smiling-warehouse.jpg" alt="Zespół" class="big_photo">
        </div> 
        <div class="qoutes">
            <p class="qoute">
                Nasz zespół pracuje przez 24 godziny na dobę, 7 dni w tygoniu, aby zapewnić naszym klientom jak najwyższą jakość obsługi oraz 
                możliwie najkrótszy czas oczekiwania na przesyłkę. 
            </p>
        </div>
    </div>
 </div>

  <?php include("comps/footer.php") ?>
</body>
</html>