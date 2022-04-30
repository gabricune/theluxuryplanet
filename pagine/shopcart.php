<?php
	session_start();
	//echo session_id();

	require('data/connessionedb.php');
  
  $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);

	if(!isset($_SESSION['login_username'])){
		header('location: login.php');
	}
	$username = $_SESSION["login_username"];
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
      <div id="topnav" class="navbar dark">
        <a href="#" class="logo"><span>the</span>LUXURY<span>PLANET</span></a>
          <div class="navbar-right menu">
            <ul>
              <li><a href="../index.php">Home</a></li>
                <li><a href="./shop.php">Shop</a></li>
                <li><a href="./contatti.php">Contatti</a></li>
                <li><a href="shopcart.php"><i class="fa fa-shopping-bag"></i></a></li>
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

    <!--cart-->
    
    <div class="small-container cart-page">
      <table>
      <tr>
          <th>Prodotto</th>
          <th>Quantita</th>
          <th>Prezzo</th>
      </tr>
  <?php
              if(isset($_POST["idprodotto"])){
                $idprodotto=$_POST["idprodotto"];
                $deletecarr = "DELETE 
                            FROM cart
                            WHERE idutente = '$username'
                            AND idprodotto = '$idprodotto'";
                $conn->query($deletecarr) or die($conn->error);
              } 
              if(isset($_POST["quantita"])){
                $newquantita=$_POST["quantita"];
                $idprodotto=$_POST["id2prodotto"];
                $cambioq = "UPDATE cart
                              SET quantita=$newquantita
                              WHERE idprodotto=$idprodotto";
                $conn->query($cambioq) or die($conn->error);
              } 
    $sql = "SELECT *
          FROM cart JOIN prodotti on cart.idprodotto=prodotti.codprodotto
          WHERE idutente='$username'";
          $ris = $conn->query($sql);
          $tot=0;
        
          while ($row= $ris->fetch_assoc()) {
            $codprodotto=$row['codprodotto'];
            $nome=$row['nome'];
            $quantita=$row['quantita'];
            $immagine = $row['immagine'];
            //$rating = $row['rating'];
            $prezzo = $row['prezzo'];
            $temp=$prezzo*$quantita;
            $tot=$tot+$temp;
            echo "
     
      <tr>
          <td>
              <div class='cart-info'>
              <img src='$immagine' alt='seceda'>
              <div>
                  <p>$nome</p>
                  <small>Price: $prezzo $</small>
                  <br>
                  <form action='". $_SERVER['PHP_SELF'] ."' method='post'>
                  <input type='hidden' name= 'idprodotto' value='$codprodotto'>
                  <input class='btnrimuovi' type='submit' name= 'deletecarr' value='Rimuovi'>
                  </form>      
              </div>
              </div>
          </td>
          <form action='". $_SERVER['PHP_SELF'] ."' method='post'>
          <input type='hidden' name= 'id2prodotto' value='$codprodotto'>
          <td><input type='number' value='$quantita' name ='quantita'></td>
          </form>
          <td>$temp</td>
      </tr>
      ";   
          }
?>
  </table>





   

        <div class="total-price">
            <table>
              <?php
                $def=$tot+5;
                echo"
                <tr>
                    <td>subtotal</td>
                    <td>$tot $</td>
                </tr>
                <tr>
                    <td>shipping</td>
                    <td>5$</td>
                </tr>
                <tr>
                    <td>total</td>
                    <td>$def $</td>
                </tr>
                ";
                ?>

            </table>

        </div>
        <tr>
                <form class='form prod' action='pagamento.php'>
                      <input class='btn btnprod' type='submit' value='Compra ora' name='banana' style=float:right></input>
                </form>
                </tr>
    </div>



  <!-- FOOTER -->
  <?php include ('footer.php') ?>

  <!-- Jquery -->
  <script src="../app.js"></script>
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