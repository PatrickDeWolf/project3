<?php 
session_start(); 
$lang="NL";

$tel="";
$fb="";
$insta="";
$introTi="";  //lege intro titel wordt ingevuld indien p meegegeven
$introTe="";  //lege introwordt ingevuld indien p meegegeven
$naam="";
$directory="";
$lat="";
$lon="";
$loc="";
	
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








if(isset( $_GET['id']) && !empty($_GET['id'])){
	//id uit de url is de id van de databank
	include_once('db.php');
	$id = $con->real_escape_string($_GET['id']);
	$sql = "SELECT  *	FROM  projecten 	WHERE id = '$id'  "; 
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
			$naam = $row["naam"];
			$introTi = $row["titel"];
			$introTe = $row["intro"];
			$email = $row["email"];
			$tel = $row["tel"];
			$fb = $row["fb"];
			$insta = $row["insta"];
			
			$loc=$row["pc"]." ".$row["gemeente"];
			$strNr= $row["straat"]." ".$row["nr"];
			$directory= './'.$id; 
	}
}



  
?>
<!DOCTYPE html>
<html lang="<?php echo $lang;?>">
<head>
	<title><?php echo $naam;?></title> <!--titel boven in de browserbalk-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="CSS/stijl.css" rel="stylesheet" type="text/css">  <!--Verwijzing naar CSS/stijl.css-->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

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
      <a class="navbar-brand" href="#myPage"><?php echo $naam;?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#codeurs">INTRO</a></li>
        <li><a href="#contact">CONTACT</a></li>
		<?php
		
		if( isset($_SESSION['ingelogd']) )
		{   // INDIEN INGELOGD TOON naam gevolgd door uitloggen.
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



<?php 
// var_dump($_SESSION);
?>

<?php
function carousel($directory,$screenheight=80, $autorun=1, $bullets=1, $leftRight=1){

	if($autorun==0){$auto="data-interval='false'";}else{$auto="";}
	if (is_dir($directory)) {
		$files = scandir($directory);
		$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
		$imageFiles = [];//dit is een array of een lijst. In één variabele kan je meerdere variabelen opslaan. Momenteel is deze nog leeg
		foreach ($files as $file) {
			$fileExtension = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array(strtolower($fileExtension), $allowedExtensions)) {
				$imageFiles[] = $file;
			}
		}
		echo"<div id='myCarousel' class='carousel slide' data-ride='carousel' ".$auto.">";
		   
			///bolletjes
		if((count($imageFiles) >1) && count($imageFiles) <11 &&($bullets==1)){
				echo" <ol class='carousel-indicators'>";
				for($x=0; $x<count($imageFiles); $x++){
					if($x==0){$ac="active";}else{$ac="";}
					echo"<li data-target='#myCarousel' data-slide-to='".$x."' class='".$ac."'></li>";
				}
				echo"</ol>";
			}

			///afbeeldingen
			echo"<div class='carousel-inner'>";
			for($x=0; $x<count($imageFiles); $x++){
				if($x==0){$ac="active";}else{$ac="";}
				echo"<div class='item ".$ac."' STYLE=\"height:".$screenheight."vh; background-image:url('".$directory."/".$imageFiles[$x]."'); 
				background-size:cover; background-position: center center;\">";
				echo"</div>";
			}
			echo"</div>";

			//// links rechts
			if((count($imageFiles) >1) && ($leftRight==1)){
				echo"<a class='left carousel-control' href='#myCarousel' data-slide='prev'>";
				echo"<span class='sr-only'>Previous</span>";
				echo"</a>";
				
				echo"<a class='right carousel-control' href='#myCarousel' data-slide='next'>";
				echo"<span class='sr-only'>Next</span>";
				echo"</a>";
			}
		echo"</div>";
	}
}
carousel($directory,100,1,1);
?>
	
	<!--
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
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
-->

<?php 
if( isset($_SESSION['ingelogd'])  && isset($id) && !empty($id)){  include_once('./modals/modalIntro.php');} 
?>



<div id="codeurs" class="container text-center">
	<h3 id='introTitel'><?php echo $introTi;?></h3>
	<p id='introText'><?php echo $introTe;?></p>
	<br>
</div>






<!-- Container (Contact Section) -->
<?php
echo"<div id='contact' class='container'>";
	echo"<h3 class='text-center'>CONTACT</h3>";

	echo"<div class='row'>";
		echo"<div class='col-md-4'>";
		echo"</div> ";

		echo"<div class='col-md-4'>";
			//echo"<br><br>";
			echo"<center>";
			echo"<table border='0'>";
			
				if($loc != "")
				{
				echo"<tr>";
					echo"<td><span class='glyphicon glyphicon-map-marker' 	STYLE='margin-right:5px;'></span></td>";
					echo"<td>".$loc."</td>";
				echo"</tr>";
				}

				echo"<tr>";
					echo"<td><span class='glyphicon glyphicon-phone' 	STYLE='margin-right:5px;'></span></td>";
					echo"<td>Tel: +32 444 555 666</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td><span class='glyphicon glyphicon-envelope' 	STYLE='margin-right:5px;'></span></td>";
					echo"<td>test@test.be</td>";
				echo"</tr>	";
			echo"</table>";
			echo"</center>";
		echo"</div>";

		echo"<div class='col-md-4'>";
		echo"</div>";
	echo"</div>";
	
	
	echo"<br>";
echo"</div>";
?>


    



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
