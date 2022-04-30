<?php
	session_start();
	//echo session_id();
  require('data/connessionedb.php');

  if(isset($_GET['codprodotto'])){
    $codprodotto=$_GET['codprodotto'];
  }

	if(!isset($_SESSION['login_username'])){
		header('location: dati_personali.php');
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



  <div class="small-container single-product">
      <div class="row">
      <?php
      $sql= "SELECT *
            FROM prodotti
            WHERE codprodotto=$codprodotto";
      $ris = $conn->query($sql);
      while ($row= $ris->fetch_assoc()) {
        $nome=$row['nome'];
        $immagine = $row['immagine'];
        //$rating = $row['rating'];
        $prezzo = $row['prezzo'];
        $descrizione=$row['descrizione'];
        $tipologia=$row['tipologia'];
        echo "
          <div class='col-2'>
            <img src='$immagine' alt='stocazzo'>


          </div>
          <div class='col-2'>
            <p>Home / Prodotto</p>
            <h2>$nome</h2>
            <h4>$prezzo $</h4>
            <select>
                <option>select size</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
            </select>
            <br>
            <form class='form prod' method='post'>
              <input type='number' value='1' name='quantita'></input>
              <input class='btn btnprod' type='submit' value='Aggiungi al carrello' name='banana'></input>
            </form>
            <br>
            <form class='form prod' method='post'>
            <div class='rate'>
            <input type='radio' id='star5' name='rate' value='5' />
            <label for='star5' title='text'>5 stars</label>
            <input type='radio' id='star4' name='rate' value='4' />
            <label for='star4' title='text'>4 stars</label>
            <input type='radio' id='star3' name='rate' value='3' />
            <label for='star3' title='text'>3 stars</label>
            <input type='radio' id='star2' name='rate' value='2' />
            <label for='star2' title='text'>2 stars</label>
            <input type='radio' id='star1' name='rate' value='1' />
            <label for='star1' title='text'>1 star</label>
          </div>
          </form>
            <br>
            <h3>Product details <i class='fa fa-indent' ></i></h3>
            <br>
            <p> $descrizione </p>
          </div>
          ";
          if(isset($_POST["banana"]) && !empty ($_POST['banana']))
          { 
          $quantita=$_POST['quantita'];
          $myquery = "INSERT INTO cart (idprodotto, prezzo, idutente, quantita)
          VALUES ('$codprodotto','$prezzo','$username', '$quantita' )";
          $conn->query('SET FOREIGN_KEY_CHECKS=0;');
          $conn->query($myquery);
          $conn->query('SET FOREIGN_KEY_CHECKS=1;');
          }
        }
          ?>
      </div>
  </div>
  <br>
  

  <!--featured products-->
  <div class="small-container">
  <h2 class="titleshop">Consigliati</h2>
    <div class='row'>
    <?php
    $sql = "SELECT *
          FROM prodotti
          WHERE tipologia='$tipologia'
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
        <
        <div class='rating'>
          <i class='fa fa-star' ></i>
          <i class='fa fa-star' ></i>
          <i class='fa fa-star' ></i>
          <i class='fa fa-star' ></i>
          <i class='fa fa-star-o'></i>
        </div>
        <p>$prezzo</p>

    </div>";   
    $temp++;
  }
  ?>
        </div>
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
<?php
	$conn->close();
?>