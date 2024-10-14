<?php 
session_start(); 
$lang="NL";

if(isset($lang) && $lang=="NL"){
	$sluitknop="sluit";
	$verzendknop="verzend";
}
elseif(isset($lang) && $lang=="FR"){
	$sluitknop="fermer";
	$verzendknop="envoyer";
}else{
	$sluitknop="close";
	$verzendknop="send";
}




$introTi="";  //lege intro titel wordt ingevuld indien p meegegeven
$introTe="";  //lege introwordt ingevuld indien p meegegeven





if(isset( $_GET['p']) && !empty($_GET['p'])){
	include_once('db.php');
	$p = $con->real_escape_string($_GET['p']);
	$sql = "SELECT  *	FROM  projecten 	WHERE naam = '$p'  "; 
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
			$introTi = $row["titel"];
			$introTe = $row["intro"];
			$email = $row["email"];
			$tel = $row["tel"];
			$fb = $row["fb"];
			$insta = $row["insta"];
			
			$loc=$row["pc"]." ".$row["gemeente"];
			$strNr= $row["straat"]." ".$row["nr"];
			//var_dump($row);
	}
}else{
	echo "GEEN p meegegeven in de URL";
}






if( isset($_SESSION['ingelogd']) && isset($_SESSION['user']) )
{   // INDIEN INGELOGD TOON naam gevolgd door uitloggen.
	$project=$_SESSION['sites'][0]['naam'];
	$projectId=$_SESSION['sites'][0]['id'];
}
  
  
?>
<!DOCTYPE html>
<html lang="<?php echo $lang;?>">
<head>
	<title><?php echo $project;?></title> <!--titel boven in de browserbalk-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="CSS/stijl.css" rel="stylesheet" type="text/css">  <!--Verwijzing naar CSS/stijl.css-->
</head>




<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">


<nav class="navbar navbar-default navbar-fixed-top"> <!--MENU-->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"><?php echo $project;?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#codeurs">INTRO</a></li>
        <li><a href="#contact">CONTACT</a></li>
		<?php
		
		if( isset($_SESSION['ingelogd']) )
		{   // INDIEN INGELOGD TOON naam gevolgd door uitloggen.
			// de link is ook gewijzigd naar logout
			echo"<li><a href='logout.php'><i class='fa fa-sign-out'></i></a></li>";
		}else{
			// INDIEN NIET INGELOGD TOON inloggen en link naar inloggen.php
			echo"<li><a href='login.php'>inloggen</a></li>";
		}
		
		?>
      </ul>
    </div>
  </div>
</nav>

<br><br>

<?php 
var_dump($_SESSION);
?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators  (bolletjes)-->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>





    <!-- Wrapper for slides (afbeeldingen met inline css en tekst)-->
    <div class="carousel-inner" role="listbox">
      <div class="item active"
       STYLE="
      height:100vh; width:100vw; background-image:url('afbeeldingen/ny.jpg'); background-size:cover;
      background-position:center center;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>The atmosphere in New York is lorem ipsum.</p>
        </div>      
      </div>

      <div class="item"
      STYLE="
     height:100vh; width:100vw; background-image:url('afbeeldingen/chicago.jpg'); background-size:cover;
     background-position:center center;">
       <div class="carousel-caption">
         <h3>Chicago</h3>
         <p>Thank you, Chicago - A night we won't forget.</p>
       </div>      
     </div>

     <div class="item"
     STYLE="
    height:100vh; width:100vw; background-image:url('afbeeldingen/la.jpg'); background-size:cover;
    background-position:center center;">
      <div class="carousel-caption">
        <h3>LA</h3>
        <p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p>
      </div>      
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
	</div>
</div>


<?php 
if( isset($_SESSION['ingelogd']) && isset($_SESSION['user']) && isset($p) && !empty($p)){ include_once('./modals/modalIntro.php');} 
?>



<div id="codeurs" class="container text-center">
	<h3 id='introTitel'><?php echo $introTi;?></h3>
	<p id='introText'><?php echo $introTe;?></p>
	<br>
</div>






<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">CONTACT</h3>
  <p class="text-center"><em>Programmeren voor iedereen!</em></p>

  <div class="row">
    <div class="col-md-4">
      <p><b>Fan? Drop een berichtje.</b></p>
      <br><br>
      <p><span class="glyphicon glyphicon-map-marker"></span>Sint-Jans-Molenbeek, BE</p>
      <p><span class="glyphicon glyphicon-phone"></span>Tel: +32 444 555 666</p>
      <p><span class="glyphicon glyphicon-envelope"></span>E-mail: mail@gmail.be</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Naan" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Bericht" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit"><?php echo $verzendknop;?></button>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>





<img src="afbeeldingen/map.jpg" class="img-responsive" style="width:100%">






<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <br><br>
  <p>Bootstrap Thema ontwikkeld door: <a href="https://www.campustoverfluit.be" data-toggle="tooltip" >www.campustoverfluit.be</a></p> 
</footer>


<script src="Javascript/smoothScroll.js"></script>


</body>
</html>
