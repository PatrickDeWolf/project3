<?php
session_start();

if(isset($_SESSION['ingelogd'])){echo "<center><br><br><br><br><br>U bent al ingelogd. <a href='index.php'>Ga terug</a></center>"; }

if(isset($_POST['code'])  && isset($_POST['ww'])   ){   // PAS AAN
	
	include_once('db.php');   //INDIEN POST BESTAANT, CONNECTIE MET DB


	$email = $con->real_escape_string($_POST['code']);
	$ww = $con->real_escape_string($_POST['ww']);    /// VOEG TOE
	
	// echo"<br>";
	// echo $email;
	// echo"<br>";
	// echo $ww;
	// echo"<br><br>";


	$sql = "SELECT email, password 	, naam, id	
			FROM projecten 
			WHERE email = '$email' 
			AND password='$ww' ";
											//PAS QUERY AAN
		// echo $sql;	
			
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		
		
		while($row = $result->fetch_assoc()) {
			//$naam[]=$row["naam"];
			//$id[]= $row["id"];
			$persoonsData[] = array("id"=>  $row["id"], "naam"=> 	$row["naam"] );
		}
		
        $_SESSION['ingelogd']="ja";
	    $_SESSION['user']=$email;
		$_SESSION['sites']=$persoonsData;
		$_SESSION['aantalSites']=count($persoonsData);
        
        $backTo="index.php";
        header('Location: '.$backTo);

    }else{
        echo"Je inloggegevens zijn niet correct";
    }
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br><br><br><br>
<div class="container">
	<a href='index.php'> HOME </a>
	<div class="panel panel-primary">
		<div class="panel-heading">Inloggen:</div>
		<div class="panel-body">
			<br>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
				<div class="form-group">
				<label for="code">Jou login gegevens:</label>
				<input type="email" class="form-control" id="code" placeholder="e-mail" name="code"><br>
                <input type="password" class="form-control" id="ww" placeholder="wachtwoord" name="ww">
				</div>

				<button type="submit" class="btn btn-primary">login</button>
			</form>
			<br>
		</div>
	</div>
	
	

</div>

</body>
</html>

