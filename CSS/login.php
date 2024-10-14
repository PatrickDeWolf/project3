<?php
session_start();
$codes=array("leerkracht","JOU NAAM","JOU NAAM 2","JOU NAAM 3");
if(isset($_SESSION['ingelogd'])){echo "<center><br><br><br><br><br>U bent al ingelogd. <a href='index.php'>Ga terug</a></center>"; }


if(isset($_POST['code']) && in_array($_POST['code'],$codes)){
	
	// INDIEN HET GEPOSTE (code) IN DE ARRAY STAAT: SCHRIJF IN DE ARRAY
	//echo"IN DE ARRAY";
	
	$_SESSION['ingelogd']="ja";
	$_SESSION['user']=$_POST['code'];
	
	$backTo="index.php";
	header('Location: '.$backTo);
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
				<label for="code">Jou code:</label>
				<input type="text" class="form-control" id="code" placeholder="jou code" name="code">
				</div>

				<button type="submit" class="btn btn-primary">login</button>
			</form>
			<br>
		</div>
	</div>
	
	

</div>

</body>
</html>

