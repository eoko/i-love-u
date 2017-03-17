<!DOCTYPE html>
<html>
	<head>
		<title>I LOVE U</title>
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
		<script src ="js/traitement.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<p>Your Like counts,please press the like button.</p>
		<form method = "post" action = "index.php">
			<input type = "hidden" name = "ip">
			<button id = "btn" class = "button" type = "submit"/>
		</form>
		
		<!-- <div>
			<p>So far we got : </p>
			<p>likes</p>
		</div> -->

	</body>
</html>

<?php

if(isset($_POST["ip"]))
{
	$ip = $_POST['ip'];
	$file = 'ip_adresses.txt';
	// Ouvre un fichier pour lire un contenu existant
	$current = file_get_contents($file);
	// Ajoute une personne
	$current .= $ip;
	// Écrit le résultat dans le fichier
	file_put_contents($file, $current);


	//ajout d'un like
	$file1 = 'lov_count.txt';
	$like = file_get_contents($file1);
	$like += 1;
	file_put_contents($file1, $like);
}

?>