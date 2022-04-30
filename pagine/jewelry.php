<?php
	session_start();
	//echo session_id();

	require('data/connessionedb.php');

	if(!isset($_SESSION['login_username'])){
		header('location: login.php');
	}
	$username = $_SESSION["login_username"];
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
    <link rel="stylesheet" type="text/css" href="../style.css">
  </head>

  <body>
  
  <!-- NAV -->
  <nav>
      <div id="topnav" class="navbar">
        <a href="#" class="logo"><span>the</span>LUXURY<span>PLANET</span></a>
          <div class="navbar-right menu">
            <ul>
              <li><a href="../index.php" class="active">Home</a></li>
              <li><a href="./shop.php">Shop</a></li>
              <li><a href="./contatti.php">Contatti</a></li>
              <li><a href="./shopcart.php"><i class="fa fa-shopping-bag"></i></a></li>
              <li><a href="./dati_personali.php"><i class="fa fa-user" aria-hidden="true" ></i></a></li>
              <li><a href="./logout.php">Logout</a></li>
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
  <div class="slider slider--shop">
    <div class="slides">
        <div class="slide">
            <div class="slide-data slide-data--btn">
                <h1>Benvenuto nel lusso</h1>
                <p>TheLuxuryPlanet è il luogo dove i sogni diventano realtà</p>
                <a href="#ancora1">
                <button>scopri</button>
                </a>
            </div>
        </div>
        <div class="slide slide--scura">
            <div class="slide-data">
                <h1>Un E-Shop unico</h1>
                <p>Acquista articoli di sport, alta gioielleria e molto altro</p>
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
  <hr class="lineanera">

  <!--featured-->
  <div class="categorie">
    <div class="small-container">
      <div class="row">
        <div class="col-3">
          <img src="./immagini/img26.jpg" alt="seceda">
        </div>
        <div class="col-3">
          <img src="./immagini/img26.jpg" alt="seceda">
        </div>
        <div class="col-3">
          <img src="./immagini/img26.jpg" alt="seceda">
        </div>
      </div>
    </div>
  </div>
  
  <!--featured products-->
  <div class="small-container">
    <h2 class="titleshop">Orologi</h2>
     <div class='row'>
  <?php
    $sql = "SELECT *
          FROM prodotti
          WHERE nome LIKE 'Philippe Patek%'
          ORDER BY codprodotto DESC";
          $ris = $conn->query($sql);
          $temp=0;
          while ($row= $ris->fetch_assoc() and $temp!=4) {
            $codprodotto=$row['codprodotto'];
            $nome=$row['nome'];
            $immagine = $row['immagine'];
            //$rating = $row['rating'];
            $prezzo = $row['prezzo'];
            echo "

      <div class='col-4'>
      <a href='prodotto.php?codprodotto=$codprodotto'>
        <img src='$immagine' alt='seceda' >
        </a>
        <p>$nome</p>
        <p>$prezzo $</p>
      </div>";   
    $temp++;
  }
  ?>
  </div>
  </div>
  
  <!--featured products-->
  <div class="small-container">
    <h2 class="titleshop">Gioielli</h2>
     <div class='row'>
  <?php
    $sql = "SELECT *
          FROM prodotti
          WHERE nome LIKE 'Cartier %'
          ORDER BY codprodotto DESC";
          $ris = $conn->query($sql);
          $temp=0;
          while ($row= $ris->fetch_assoc() and $temp!=4) {
            $codprodotto=$row['codprodotto'];
            $nome=$row['nome'];
            $immagine = $row['immagine'];
            //$rating = $row['rating'];
            $prezzo = $row['prezzo'];
            echo "

      <div class='col-4'>
      <a href='prodotto.php?codprodotto=$codprodotto'>
        <img src='$immagine' alt='seceda' >
        </a>
        <p>$nome</p>
        <p>$prezzo $</p>
      </div>";   
    $temp++;
  }
  ?>
  </div>
  </div>

  
  <!-- FOOTER -->
  <?php 
    include ('footer.php');
  ?>



  <!-- Jquery -->
  <script src="../index.js"></script>
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