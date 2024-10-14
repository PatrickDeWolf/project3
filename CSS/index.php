<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>AAN TE PASSEN</title> <!--titel boven in de browserbalk-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="CSS/stijl.css" rel="stylesheet" type="text/css">  <!--Verwijzing naar CSS/stijl.css-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 
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
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#codeurs">ONZE MISSIE</a></li>
        <li><a href="#contact">CONTACT</a></li>
		<?php
		
		if( isset($_SESSION['ingelogd']) && isset($_SESSION['user']) )
		{   // INDIEN INGELOGD TOON naam gevolgd door uitloggen.
			// de link is ook gewijzigd naar logout
			echo"<li><a href='logout.php'>".$_SESSION['user']." logout</a></li>";
		}else{
			// INDIEN NIET INGELOGD TOON inloggen en link naar inloggen.php
			echo"<li><a href='login.php'>inloggen</a></li>";
		}
		
		?>
      </ul>
    </div>
  </div>
</nav>






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

      



    <!-- Left and right controls (links en rechts pijlen)-->
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


<!-- Container (de codeurs sectie nieuw blok) -->
<div id="codeurs" class="container text-center">
  <h3>ONZE MISSIE</h3>
  <p><em>We love progzzz!</em></p>
  <p>We have created a fictional website. Foto's zij afkomstig van Google en mogen niet zomaar gebruikt 
    worden omdat er rechten op staan.
    Wanneer je foto's wenst te gebruiken die mooi zijn en geen rechten bevatten, surf dan naar <a href='pexels.com'>pexels.com</a>
    Pas de website aan naar jou wensen. Hou er rekening mee dat de website zowel op pc als op gsm mooi moet zijn.
    In de header zal je zien dat er  verwijzingen zijn naar Bootstrap. Dit is ene bestaande bibliotheek die ervoor zorgt
    dat je website responsive zal worden en dus mooi zichtbaar op elk scherm.
    </p>
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
          <button class="btn pull-right" type="submit">Verzend</button>
        </div>
      </div>
    </div>
  </div>
  <br>
</div>









<!-- Image of location/map -->
<img src="afbeeldingen/map.jpg" class="img-responsive" style="width:100%">






<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Bootstrap Thema ontwikkeld door: <a href="https://www.campustoverfluit.be" data-toggle="tooltip" >www.campustoverfluit.be</a></p> 
</footer>


<script src="Javascript/smoothScroll.js"></script>


</body>
</html>
