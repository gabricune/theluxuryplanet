<?php
	session_start();
	//echo session_id();

	require_once('data/connessionedb.php');

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
  <?php
    require('nav.php') 
  ?>

    <!-- Contenuto-->
    <div class="text">L'ordine è stato ricevuto e sarà spedito in 3-5 giorni lavorativi.</div>
    <?php
    
    $sql = "SELECT indirizzo
          FROM users
          WHERE username='$username'";
          $ris = $conn->query($sql);
          while ($row= $ris->fetch_assoc()) {
            $address=$row['indirizzo'];
            echo "Il pacco sarà spedito a $address.";
          }
            
    ?>

    <!-- FOOTER -->
    <?php include ('footer.php') ?>

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