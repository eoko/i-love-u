<?php

	if(isset($_GET["ip"]))
	{
		//ajout de l'ip au fichier
		file_put_contents('ip_adresses.txt', $_GET["ip"].";".PHP_EOL, FILE_APPEND);


		//ajout du nombre de like
		$like = file_get_contents('lov_count.txt');
		$like += 1;
		file_put_contents('lov_count.txt', '');
		file_put_contents('lov_count.txt', $like);

	}
?>