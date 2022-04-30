<?php
	session_start();


	require('data/connessionedb.php');

	if(!isset($_SESSION['login_username'])){
		header('location: login.php');
	}

	$username = $_SESSION["login_username"];


	$strmodifica = "Modifica";
	$strconferma = "Conferma";

	$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
	$modifica = false;
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pulsante_modifica"])) {
		if($_POST["pulsante_modifica"] == $strmodifica){
			$modifica = true;
		} else {
			$modifica = false;
		}

		if ($modifica == false){
			$sql = "UPDATE users
					SET pwd = '".$_POST["pwd"]."', 
						nome = '".$_POST["nome"]."', 
						cognome = '".$_POST["cognome"]."', 
						mail = '".$_POST["email"]."', 
						indirizzo = '".$_POST["indirizzo"]."' 
					WHERE username = '".$username."'";
			if($conn->query($sql) === true) {
				//echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Modifica Dati personali</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php
	require ('nav.php');
	?>
	<div class="containerx">
		<h1>Dati Personali</h1>
		<?php
			$sql = "SELECT *
				FROM users
				WHERE username='".$username."'";
			//echo $sql;
			$ris = $conn->query($sql) or die("<p>Query fallita!</p>");
			// $row = $ris->fetch_array(MYSQLI_ASSOC);
			$row = $ris->fetch_assoc();
		?>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
			<table id="tab_dati_personali">
				<tr>
					<td>Username:</td> <td><input type="text" name="username" value="<?php echo $row["username"]; ?>" disabled="disabled"></td>
				</tr>
				<tr>
					<td>Password:</td> <td><input class="input_dati_personali" type="text" name="pwd" value="<?php echo $row["pwd"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Nome:</td> <td><input class="input_dati_personali" type="text" name="nome" value="<?php echo $row["nome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Cognome:</td> <td><input type="text" class="input_dati_personali" name="cognome" value="<?php echo $row["cognome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Email:</td> <td><input type="text" class="input_dati_personali" name="email" value="<?php echo $row["mail"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
				<tr>
					<td>Indirizzo:</td> <td><input type="text" class="input_dati_personali" name="indirizzo" value="<?php echo $row["indirizzo"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
				</tr>
			</table>
			<p style="text-align: center">
				<input class='btn btnprod' type="submit" name="pulsante_modifica" value="<?php if($modifica==false) echo $strmodifica; else echo $strconferma; ?>">
			</p>
		</form>	
	</div>	
	<?php include ('footer.php') ?>
</body>
</html>