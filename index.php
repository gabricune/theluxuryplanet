<?php
	session_start();

  require('pagine/data/connessionedb.php');
  
  $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
 ?>

<!DOCTYPE html>
<html lang="it">

  <head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
  
  <!-- NAV -->
  <nav>
      <div id="topnav" class="navbar">
        <a href="#" class="logo"><span>the</span>LUXURY<span>PLANET</span></a>
          <div class="navbar-right menu">
            <ul>
              <li><a href="index.php" class="active">Home</a></li>
              <li><a href="./pagine/shop.php">Shop</a></li>
              <li><a href="./pagine/contatti.php">Contatti</a></li>
              <li><a href="./pagine/shopcart.php"><i class="fa fa-shopping-bag"></i></a></li>
              <li><a href="./pagine/dati_personali.php"><i class="fa fa-user" aria-hidden="true" ></i></a></li>
            </ul>
          </div>
          <div class="navbar-right">
            <a href="javascript:void(0);" class="icon" onclick="showMenu()">
              <i class="fa fa-bars"></i>
            </a>
          </div>
      </div>
    </nav>



  <!-- SLIDE HERO -->
  <div class="slider">
    <div class="slides">
        <div class="slide">
            <div class="slide-data">
                <h1>Benvenuto nel lusso</h1>
                <p>TheLuxuryPlanet è il luogo dove i sogni diventano realtà</p>
                <br>
                <a href="#ancora1">
                <button>scopri</button>
                </a>
            </div>
        </div>
        <div class="slide slide--scura">
            <div class="slide-data">
                <h1>Un E-Shop unico</h1>
                <p>Acquista articoli di sport, alta gioielleria e molto altro</p>
                <br>
                <a href="#ancora2">
                  <button>scopri</button>
                </a>
            </div>
        </div>
        <div class="slide">
            <div class="slide-data">
                <h1>TheHubs</h1>
                <p>Scopri le nostre sedi e lasciati guidare dalla magia del lusso</p>
                <a href="#ancora3">
                  <button>scopri</button>
                </a>
            </div>
        </div>
    </div>

    <button class="arrows prev" onclick="plusslide(-1)">
        <span><i class="fas fa-angle-left"></i></span>
    </button>
    <button class="arrows next" onclick="plusslide(1)">
        <span><i class="fas fa-angle-right"></i></span>
    </button>

    <div class="dots">
        <span onclick="currentslide(1)"></span>
        <span onclick="currentslide(2)"></span>
        <span onclick="currentslide(3)"></span>
    </div>
  </div>
  <a name="ancora1"></a>
  <br>


    <!-- GALLERIA 3 -->
    <div class="galleria zoom">
      <h2>Vivi l'eperienza del lusso</h2>
      <p>Acquista i migliori articoli del mondo dello sport: vela ed equitazione, gli sport selezionati dal team di TheLuxuryPlanet</p>
      
      <div class="galleriabox galleriabox--res zoom">
        <img src="./immagini/lux1.jpg" alt="lux1">
      </div>
      <div class="galleriabox zoom">
        <img src="./immagini/lux2.jpg" alt="lux2">
      </div>
      <div class="galleriabox galleriabox--res zoom">
        <img src="./immagini/lux3.jpg" alt="lux3">
      </div>
      <br>
      <div class="reveal">
      <p>La nostra piattaforma di design ti permette di navigare con serenità e scoprire prodotti d’alta qualità, selezionati per le migliori prestazioni sportive.</p>
    </div>
    </div>



  <!-- PANEL 2 -->
  <div class="str4">
    <div class="imagec4 reveal">
      <img src="./immagini/img77.jpg" alt="immagine">
    </div>
    <div class="testo4 reveal">
      <h2>Dove i sogni diventano realtà</h2>
      <p>Hai mai immaginato un luogo dedicato all’esperienza del lusso? Hai appena raggiunto il posto giusto! Su TheLuxuryPlanet troverai ciò che stai cercando!</p>
    </div>
  </div>
  <a name="ancora2"></a>
    <div class="containerdiscover">
      <div class="boxdiscover boxdiscover--news">
        <div class="contenutodiscovertext contenutodiscovertext--news">
          <h1 class="tw">E-Shop</h1>
          <p>Acquista i migliori articoli di orologeria e gioielleria, Patek Philippe e Cartier, tra le migliori marche del settore.</p>
          <br>
          <a href="./pagine/shop.php">
                <button>registrati e acquista</button>
          </a>
        </div>
      </div>
    </div>
  
  </div>
  </div>
  <a name="ancora3"></a>
    <div class="titoloservizi">
      <h1>TheHubs</h1>
    </div>
    <div class="containerservizi">
      <div class="servizibox zoom">
        <div class="numero"><h1>ITA</h1></div>
        <h2>Milano</h2> 
      </div>
      <div class="servizibox zoom">
        <div class="numero"><h1>UK</h1></div>
        <h2>Londra</h2> 
      </div>
      <div class="servizibox zoom">
        <div class="numero"><h1>USA</h1></div>
        <h2>New York</h2>   
      </div>
    </div>


<!-- PANEL 3 MAPPE -->
<div class="str4">
  <div class="map reveal">
    <iframe class="mappaattributes"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89547.2303835233!2d9.17773225!3d45.46273385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c1493f1275e7%3A0x3cffcd13c6740e8d!2sMilano%20MI!5e0!3m2!1sit!2sit!4v1651779600889!5m2!1sit!2sit"></iframe>
  </div>
  <div class="testo4 reveal">
    <h2>TheHub Milano</h2>
    <p>Vieni a trovarci al nostro hub di Milano, situato a pochi passi dal Duomo, posizione ideale per fare affari.</p>
  </div>
</div>

<div class="str4 str4--white">
  <div class="map reveal">
    <iframe class="mappaattributes" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20Stati%20Uniti!5e0!3m2!1sit!2sit!4v1651778392818!5m2!1sit!2sit"></iframe>
  </div>
  <div class="testo4 reveal">
    <h2>TheHub New York</h2>
    <p>Vieni a trovarci al nostro hub di New York, situato a pochi passi da Times Square, piazza perfetta per chi ama fare shopping.</p>
  </div>
</div>

<div class="str4">
  <div class="map reveal">
    <iframe class="mappaattributes" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.182370726!2d-0.10159865000000001!3d51.52864165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondra%2C%20Regno%20Unito!5e0!3m2!1sit!2sit!4v1651778911833!5m2!1sit!2sit"></iframe>
  </div>
  <div class="testo4 reveal">
    <h2>TheHub Londra</h2>
    <p>Vieni a trovarci al nostro hub di Londra, situato accanto al Big Ban: alza la testa e vedrai sempre che ora è.</p>
  </div>
</div>


  <!-- FOOTER -->
  <?php include ('pagine/footer.php') ?>



  <!-- Jquery -->
  <script src="index.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script>
  $(window).scroll(function(){
    if($(window).scrollTop()){
      $("nav").addClass("sopra");
    }
    else{
      $("nav").removeClass("sopra");
    }

  });
  </script>
  
  <script>
    ScrollReveal ().reveal('.reveal', { distance: '100px', duration: 300, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 300 }); 
    ScrollReveal ().reveal('.reveal2', { distance: '100px', duration: 300, easing: 'cubic-bezier(.215, .61, .355, 1)',origin:'left', interval: 300 }); 
    ScrollReveal ().reveal('.reveal3', { distance: '180px', duration: 500, easing: 'cubic-bezier(.215, .61, .355, 1)',origin:'right', interval: 300 }); 
    ScrollReveal ().reveal('.zoom', { duration: 1500, easing: 'cubic-bezier(.215, .61, .355, 1)', interval: 200, scale: 0.65, mobile: false });
  </script>

  </body>
</html>