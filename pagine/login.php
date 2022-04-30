<?php
session_start();
	
require('data/connessionedb.php');


error_reporting(E_ALL ^ E_WARNING); 

if(isset($_POST["login_username"])){
	$nome_utente = $_POST["login_username"];
}
else{
	$nome_utente = "";
}

if (isset($_POST["login_password"])){
	$password = $_POST["login_password"];
}
else {
	$password = "";
}

require('Data\connessionedb.php');


$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);


if($conn->connect_error){
    die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
}


    if(isset($_POST["username"])) $username = $_POST["username"];  else $username = "";
    if(isset($_POST["password"])) $password = $_POST["password"];  else $password = "";
    if(isset($_POST["register_nome"])) $nome = $_POST["register_nome"];  else $nome = "";
    if(isset($_POST["register_cognome"])) $cognome = $_POST["register_cognome"];  else $cognome = "";
    if(isset($_POST["register_email"])) $email = $_POST["register_email"];  else $email = "";
    if(isset($_POST["register_indirizzo"])) $indirizzo = $_POST["register_indirizzo"];  else $indirizzo = "";
    //login
    if(isset($_POST["login_username"]) and isset($_POST["login_password"]))
    {
      $username=$_POST['login_username'];
      $password=$_POST['login_password'];
      $login_sql= "SELECT * 
      FROM users
      WHERE username='$username' AND pwd='$password'";
      $ris_login= $conn->query($login_sql) or die("<p>Query fallita! ".$conn->error."</p>");
      if($ris_login->num_rows == 0){
        echo "<p>Utente non trovato o password errata</p>";
        $conn->close();
        header('location: shop.php');
      }
      else {
        $_SESSION["login_username"]=$username;
        echo"<p>Login Funzionante</p>";
        $conn->close();
        header('location: shop.php');
      }
    }
   

    //register
            if(isset($_POST["username"]) and isset($_POST["password"])) {
                if (empty($_POST["username"]) or  empty($_POST["password"])) {
                    echo "username e password non possono essere vuoti!";
                } 
                else {
                  $myquery = "SELECT username 
						      FROM users
						      WHERE username='" . $_POST["username"] . "'";
                  $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                  if ($ris->num_rows != 0) {
                      echo "Questo username è già stato usato";
                  } else {
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $nome=$_POST['register_nome'];
                    $cognome=$_POST['register_cognome'];
                    $email=$_POST['register_email'];
                    $indirizzo=$_POST['register_indirizzo'];
                    $myquery= "INSERT INTO users (username, pwd, Nome, Cognome, mail, indirizzo)
                    VALUES ('$username', '$password', '$nome', '$cognome','$email','$indirizzo')";  
                    if ($conn->query($myquery) == true) {
                  //    session_start();
                      $_SESSION["username"]=$username;      
						          $conn->close();
                      echo "Registrazione effettuata con successo! Ora effettua il login";
                      header('URL=shop.php');
                    }else {
                      echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                    }
                  }
                }
            }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- login -->
          <form action="<?php $_SERVER['PHP_SELF'] ?>" class="sign-in-form" method="post">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="login_username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="login_password" />
            </div>
            <input type="submit" value="Login" class="btn solid"/>
          </form>


          <!-- register -->
          <form action="<?php $_SERVER['PHP_SELF'] ?>" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Nome" name="register_nome" />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Cognome" name="register_cognome" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="register_email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-home"></i>
              <input type="text" placeholder="Indirizzo" name="register_indirizzo" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
           
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Sei nuovo qui?</h3>
            <p>
              Registrati e acquista i prodotti di qualità
              selezionati dal nostro team di esperti, ti aspettiamo!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sei già uno di noi?</h3>
            <p>
              Accedi e scopri i nuovi prodotti, non perderti gli eventi dello shop!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          
         
        </div>
      </div>
    </div>

    <script src="../app.js"></script>
    <?php include ('footer.php') ?>
  </body>
</html>
