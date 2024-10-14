

<?php

$titel="intro";
$bloknaam="";


if(isset($lang) && $lang=="NL"){
	$sluitknop="sluit";
}
elseif(isset($lang) && $lang=="FR"){
	$sluitknop="fermer";
}else{
	$sluitknop="close";
}







echo"<button type='button' class='btn btn-info btn-lg pull-right' data-toggle='modal' data-target='#modal".$bloknaam."'><i class='fa fa-cog'></i></button>";

echo"<div class='modal fade' id='modal".$bloknaam."' role='dialog'>";
	echo"<div class='modal-dialog'>";
		echo"<div class='modal-content'>";

			echo"<div class='modal-header'>";
			echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
			echo"<h4 class='modal-title'>".$intro."</h4>";
			echo"</div>";

			echo"<div class='modal-body'>";
			
			
			echo"PLAATS HIER JE FORMULIER";
			
			
			echo"</div>";

			echo"<div class='modal-footer'>";
			echo"<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
			echo"</div>";

		echo"</div>";

	echo"</div>";
echo"</div>";
?>

