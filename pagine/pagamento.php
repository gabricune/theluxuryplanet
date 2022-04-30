<?php
	session_start();
	//echo session_id();

	require('data/connessionedb.php');

	if(!isset($_SESSION['login_username'])){
		header('location: login.php');
	}
  
	if(isset($_POST['invio'])){
		header('location: Spedizione.php');
	}

	$username = $_SESSION["login_username"];
  $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <title>Pagamento</title>
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
              <li><a href="shop.php">Shop</a></li>
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


  <!-- SECTION -->
  <section>
    <div class="containerx">
      <form action="spedizione.php" id="my-form" method="post">
        <h1 class="h1contacts">Inserisci dati di pagamento</h1>
        <div class="form-group">
          <label for="Indirizzo">Indirizzo fatturazione</label>
          <input type="text" id="Indirizzo" name="Indirizzo">
        </div>
  
        <div class="form-group">
          <label for="latsName">Numero Carta</label>
          <input type="number" id="NumeroCarta" name="NumeroCarta">
        </div>
  
        <div class="form-group">
          <label for="data">Data Scadenza</label>
          <input type="month" id="Data" name="Data">
        </div>
  
        <div class="form-group">
          <label for="CVV">CVV</label>
          <input name="CVV" id="CVV" type="number" ></input>
        </div>

        <a href="spedizione.php">
            <button type="submit" value="invio" >Invia</button>
        </a>
      </form>
    </div>
    <div id="status"></div>
  </section>


  <!-- FOOTER -->
  <?php include ('footer.php') ?>



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

</body>
</html>