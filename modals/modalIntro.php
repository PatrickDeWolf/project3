<?php

$titel="intro";
$bloknaam="intro";


echo"<button type='button' class='btn btn-link pull-right' data-toggle='modal' data-target='#modal".$bloknaam."'><i class='fa fa-cog bigIcon'></i></button>";

echo"<div class='modal fade' id='modal".$bloknaam."' role='dialog'>";
	echo"<div class='modal-dialog'>";
		echo"<div class='modal-content'>";

			echo"<div class='modal-header'>";
				echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
				echo"<h4 class='modal-title'><b>".$titel.":</b></h4>";
			echo"</div>";

			echo"<div class='modal-body'>";
				echo"<br>";
				echo"<div class='form-group'>";
					echo"<label for='introTitel'>Titel:</label>";
					echo"<div class='input-group'>";
					echo"<input type='text' class='form-control' id='introTitel' value='".$introTi."'>";
					echo"<span class='input-group-addon' STYLE='background-color:#337ab7; color:white;'><i class='fa fa-refresh'></i></span>";
					echo"</div>";
					echo"<br>";
					echo"<div class='form-group'>";
					echo"<label for='introText'>Text:</label>";
					echo"<textarea class='form-control' id='introText' rows=8>".$introTe."</textarea>";
					echo"<button type='button' class='btn btn-info pull-right' STYLE='background-color:#337ab7;'><i class='fa fa-refresh'></i></button><br>";
					echo"</div> ";
					echo"<br>";
				echo"</div>";	
			echo"</div>";

			echo"<div class='modal-footer'>";
				echo"<button type='button' class='btn btn-default' data-dismiss='modal'>".$sluitknop."</button>";
			echo"</div>";

		echo"</div>";

	echo"</div>";
echo"</div>";
?>

