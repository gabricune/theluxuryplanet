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
    <title>Shop</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.min.css" integrity="sha512-BiFZ6oflftBIwm6lYCQtQ5DIRQ6tm02svznor2GYQOfAlT3pnVJ10xCrU3XuXnUrWQ4EG8GKxntXnYEdKY0Ugg==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
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


    <!-- SPLIT HERO -->
    <div class="containerdiscover">
      <div class="boxdiscover boxdiscover--news">
        <div class="contenutodiscovertext contenutodiscovertext--news">
          <h1 class="tw">E-Shop</h1>
          <p>Acquista articoli di sport, alta gioielleria e molto altro</p>
        </div>
      </div>
    </div>
    <div class="containerdiscover">
        <div class="boxdiscover boxdiscover--leftm">
              <div class="contenutodiscovertext">
                <h1 class="tw">Sport</h1>
                <a href="sport.php">
                  <button>scopri</button>
                </a>
              </div>
        </div>
        <div class="boxdiscoverwinter">
          
            <div class="contenutodiscovertext">
              <h1 class="tw">Jewelry</h1>
              <a href="Jewelry.php">
                <button>scopri</button>
              </a>
            </div>     
        </div>
        <div class="boxdiscoverwinter boxdiscoverwinter--rightm">
          <div class="contenutodiscovertext">
            <h1 class="tw">Events</h1>
            <a href="#ancora5">
              <button>scopri</button>
            </a>
          </div>     
      </div>
    </div>
    <br>

  <!--featured-->
  <div class="categorie">
    <div class="small-container">
      <div class="row">
        <div class="col-3">
          <img src="../immagini/prada.jpg" alt="prada">
        </div>
        <div class="col-3">
          <img src="../immagini/cartier.jpg" alt="cartier">
        </div>
        <div class="col-3">
          <img src="../immagini/ferrari.jpg" alt="ferrari">
        </div>
      </div>
    </div>
  </div>

  <!-- SLIDE HERO -->
  <div class="slider slider--shop">
    <div class="slides">
        <div class="slide slide--shop">
            <div class="slide-data slide-data--btn">
                <h1>Sport</h1>
                <p>Pratica al meglio il tuo sport preferito con i migliori prodotti del settore</p>
                <a href="#ancoras">
                <button>scopri</button>
                </a>
            </div>
        </div>
        <div class="slide slide--shop">
            <div class="slide-data slide-data--btn">
                <h1>Jewelry</h1>
                <p>Acquista articoli di alta gioielleria e fai avverare i tuoi desideri</p>
                <a href="#ancoraj">
                  <button>scopri</button>
                </a>
            </div>
        </div>
        <div class="slide slide--shop">
            <div class="slide-data slide-data--btn">
                <h1>Events</h1>
                <p>Esperienze indimenticabili, da fare almeno una volta nella vita</p>
                <a href="#ancora5">
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
  
  <br>
  <a name="ancoras"></a>
  <!--featured products-->
  <div class="small-container">
  <h2 class="titleshop">Sport</h2>
  <div class='row'>
  <?php
    $sql = "SELECT *
          FROM prodotti
          WHERE tipologia='sport'
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
  <a name="ancoraj"></a>
   <!--featured products-->
   <div class="small-container">
    <h2 class="titleshop">Jewelry</h2>
     <div class='row'>
  <?php
    $sql = "SELECT *
          FROM prodotti
          WHERE tipologia='jewelry'
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
  <a name="ancora5"></a>
   <!--featured products-->
   <div class="small-container">
    <h2 class="titleshop">Events</h2>
     <div class='row' >
  <?php
    $sql = "SELECT *
          FROM events
          ORDER BY codevento DESC";
          $ris = $conn->query($sql);
          $temp=0;
          while ($row= $ris->fetch_assoc() and $temp!=4) {
            $codevento=$row['codevento'];
            $nome=$row['nome'];
            $immagine = $row['immagine'];
            //$rating = $row['rating'];
            $prezzo = $row['prezzo'];
            echo "

      <div class='col-4'>
      <a href='eventi.php?codevento=$codevento'>
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
  <?php include ('footer.php') ?>

  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js" integrity="sha512-cA8gcgtYJ+JYqUe+j2JXl6J3jbamcMQfPe0JOmQGDescd+zqXwwgneDzniOd3k8PcO7EtTW6jA7L4Bhx03SXoA==" crossorigin="anonymous"></script>
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
