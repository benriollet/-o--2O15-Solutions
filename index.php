
<?php
//a partir du formulaire ligne 147 on recupere les valeurs et on crée un nouveau dossier
foreach($_POST['field'] as $key=>$name){
	//echo "yo $key $name <br>\n";

	if(!empty($name)){
		mkdir($_POST['folder'][$key].'/'.$name);
	}
//test recup image
	$directory = '/<o>-O2O15-Solutions';
	move_uploaded_file($_FILES['images']['tmp_name'], "$directory.$nomImage");
}

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Solutions</title>
		<style type="text/css">


			body{	font-family: "Lucida Console", Monaco, monospace;
				font-size: 10pt;
				font-color: #000;
				font-style: normal;
				margin-left: 90px;}


			}
			p{	font-family: "Lucida Console", Monaco, monospace;
				font-size: 10pt;
				font-color: #000;
				font-style: normal;}

			h1 {	
				font-family: "Lucida Console", Monaco, monospace;
				font-size: 10pt;
				font-color: #000;
				font-style: normal;

			}

			a:link {
				text-decoration: none;
				margin-left: -90px;
				font-size: 10pt;
				color: #000;
			}
			a:visited {
			text-decoration: none;
			color: #000;
			}

			a:hover, a:active {
			text-decoration: none;
			}

			input[type="file"]{
				font-family: "Lucida Console", Monaco, monospace;
				font-color: #000;
				font-style: normal;
				border-style: none;
			}
			input{
				border-style: none none none none;
				border-color: 000;
			}


			/* The code below is from the codepen: http://codepen.io/ArtemGordinsky/pen/GnLBq */
			.blinking-cursor {
				font-size: 10pt;
				-webkit-animation: 1s blink step-end infinite;
				-moz-animation: 1s blink step-end infinite;
				-ms-animation: 1s blink step-end infinite;
				-o-animation: 1s blink step-end infinite;
				animation: 1s blink step-end infinite;
				position:relative;
				left: -5px;
				border-left: solid #000 1px;
			}

			.blinking-cursor.no-blink{
				visibility: hidden;
			}

			.input-container{
				position:relative;
				left: -7px;
				background: transparent;
				font-family: "Lucida Console", Monaco, monospace;
				font-size: 10pt;
				width: 300px;
				outline-color: transparent;
  				outline-style: none;

			}

			.input-container:focus{
				color:#0F0;
			}

			/* This will hide the blinking cursor when the user clicks on the input */


			@keyframes "blink" {
			  from, to {
			    border-color: transparent;
			  }
			  40% {
			    border-color: black;
			  }
			}
			@-moz-keyframes blink {
			  from, to {
			    border-color: transparent;
			  }
			  40% {
			    border-color: black;
			  }
			}
			@-webkit-keyframes "blink" {
			  from, to {
			    border-color: transparent;
			  }
			  40% {
			    border-color: black;
			  }
			}
			@-ms-keyframes "blink" {
			  from, to {
			    border-color: transparent;
			  }
			  40% {
			    border-color: black;
			  }
			}
			@-o-keyframes "blink" {
			  from, to {
			    border-color: transparent;
			  }
			  40% {
			    border-color: black;
			  }
			}
		</style>
	</head>
	<body>
		<h1>
			<span style="font-weight:normal">
			<a href=" "="" onclick="if (document.referrer.indexOf(window.location.host) !== -1) { history.go(-1); return false; } else { window.location.href = 'website.com'; }"><!--?php echo JText::_('VOLTAR'); ?-->&nbsp;&nbsp;&nbsp;<&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
		</h1>
		<p>Envoyez un fichier .zip contenant:<br>
			— Un fichier .txt incluant les instruction de la solution<br>
			- Un fichier .pdf de l'édition ou l'affiche<br>
			- Les fichiers source<br>
			nommez votre solution ainsi (<(vos initiales)>-Solution-pour-faire.)</p>
	<form id="send-project-form" action="" method="post" enctype="multipart/form-data">
		<!-- <input type="file" name="pic"/><br>
		<button type="submit" name="btn-upload">Upload</button><br><br> -->

		<!-- <form id="formu1" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off"> -->
		<?php 
			//$var ici c'est ton repertoire;
			$directory = '../<o>-O2O15-Solutions/';
			//faire dossier
			//mkdir($directory.'.test2');
			
			$i = 0;
			foreach (glob($directory.'*') as $key => $filename) {
				
				if(is_dir($filename)){
					
					$filename = str_replace('../<o>-O2O15-Solutions/', '', $filename);

					echo htmlentities("$filename").'/';

					echo "<input type='hidden' id='champNomDossier$i' value='$filename_court' name='folder[]'> "; 
		   			echo "<span><span class='blinking-cursor'></span><input class='input-container' type='text' value='' name='field[]'autocomplete='off'></span>";			
		   			echo "<br>\n";

		   			$i++;
				}

			}

			/*$iterator = new RecursiveDirectoryIterator($directory);
			$iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);

			$filter = new MyRecursiveFilterIterator($iterator);
			//tout les fichiers de solutions 
			$all_files  = new RecursiveIteratorIterator($filter,RecursiveIteratorIterator::SELF_FIRST);

			//pour chaque valeur de all_files on crée la variable $filename = all_files[x]
			$t_noms = array();
			$t_validations = array();


			$rest = substr("abcdef", -3, 1); // retourne "d"
			$i=1;
			foreach($all_files as $filename){
				$filename_length = strlen($filename);
				//$filename_court = substr($filename,strlen($directory),($filename_length-strlen($directory)));
				$filename_court = substr($filename,23,($filename_length-23));

				$comparaison = "/".$t_noms[$i-1]."/i";

				if (preg_match($comparaison, $t_noms[$i])) {
				    $t_validations =  "Il a trouvé la même phrase, pas bon";
				} else {
				    $t_validations =  "OK";
				}

				// affiche uniquement les dossiers 
				if(is_dir($filename)){
					
					// DETECTER LE SLASH DANS LE NOM DU DOSSIER 
					$chaine = "/";
					$nomFichier = $filename;
					if (preg_match_all("/", $filename_court, $matches)) {
						if (count($matches[0])<2){
						echo "MATCHES:".count($matches[0])." /// <br>".$filename_court."<input type='hidden' id='champNomDossier".$i."' value='$filename_court' name='folder[]'> "; 
		   				echo "<span class='blinking-cursor'>$row|</span><input type='text' value='' name='field[]'>\n";			
		   				$t_noms[$i] = $filename_court;
		   				
						}

					// n'a pas trouvé de slash
					// !!! à cause du htaccess qui "genere" les slashs
					
					} else {


						echo "<br>".$filename_court."<input type='hidden' id='champNomDossier".$i."' value='$filename_court' name='folder[]'> "; 
		   				echo "<span class='blinking-cursor'>$row|</span><input type='text' value='' name='field[]'>\n";			
		   				$t_noms[$i] = $filename_court;
					}
				
					$i++;	
	   			}

			
			}


			class MyRecursiveFilterIterator extends RecursiveFilterIterator {

			    public static $FILTERS = array(
			        '__MACOSX',
			    );

			    public function accept() {
			        return !in_array(
			            $this->current()->getFilename(),
			            self::$FILTERS,
			            true
			        );
			    }

			}*/

					
		?>
			<input type="file" style="display:none" name="images[]">
			<input type="checkbox">
			<input type="checkbox" data-target="http://www.facebook.com" />			
			<button style="display:none">olé</button>
		</form>
		<script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
		<script type="text/javascript">

			$(document).ready(function() {

				$("input").click(function(e) {
					$("p").removeClass("selected");
					$(this).parent().addClass("selected");
				});

				$("input[type=checkbox]").click(function(e) {

					$("input[type=file]").trigger("click");
					var champNomDossier = $('#champNomDossier').val();
					console.log( $('#champNomDossier').val() );
					$("#send-project-form").submit();
				});
///---
				$(function(){
				  $("input[type='checkbox']").change(function(){
				  var item=$(this);    
				  if(item.is(":checked"))
				  {
				    window.location.href= item.data("target")
				  }    
				 });
				});

				$("input.input-container").click(function(e) {

					$("input.input-container").parent().find('.blinking-cursor').removeClass('no-blink');
					$(this).parent().find('.blinking-cursor').addClass('no-blink');
				});	
			
			});
		</script>

	</body>
</html>
<?php

if(isset($_POST['champNomDossier1']))
{
	$pic 	 = $_FILES['pic']['name'];
    $pic_loc = $_FILES['pic']['tmp_name'];
	$folder	 = "uploaded/";

	$to      = 'benjamin.riollet@gmail.com';
    $subject = 'Solution';
    $message = 'Nouvelle solution.';
    $headers = 'From: benjamin.riollet@gmail.com' . "\r\n" .
        'Reply-To: benjamin.riollet@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        

	if(move_uploaded_file($pic_loc,$folder.$pic) and mail($to, $subject, $message, $headers))
	{
		echo "Uploaded.";
	}
	else
	{
		echo "Error.";	}
}

