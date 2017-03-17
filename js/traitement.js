$(document).ready(function() {

	//affichage du nombre de like
	$.get('lov_count.txt', function(data) {
		
		$("#p1").text("So far we've got : "+data+" like(s).");
	});


	$("button").prop('disabled', true);

	isNewIp();

	$("button").prop('disabled', false);

	//action au click du bouton
	$("button").click( function() {

		if($(this).css("background-image") == ("url(\"http://127.0.0.1/test_eoko/i-love-u/img/loving-hover.png\")"))
		{
			
			$(this).css("background-image","url(../i-love-u/img/not-loving-hover.png)");

			$.getJSON('https://api.ipify.org?format=json', function(data){
    			loadFiles(data.ip);
			});
		}
	});

	//evenement lorsque la souris passe sur le bouton
	$("#btn").mouseenter( function() {

		if($(this).css("background-image") == ("url(\"http://127.0.0.1/test_eoko/i-love-u/img/loving.png\")"))
		{
			$(this).css("background-image","url(../i-love-u/img/loving-hover.png)");
		}
		else if($(this).css("background-image") == ("url(\"http://127.0.0.1/test_eoko/i-love-u/img/not-loving.png\")"))
		{
			$(this).css("background-image","url(../i-love-u/img/not-loving-hover.png)");
		}
	})

	//evenement lorsque la souris n'est plus sur le bouton
	$("#btn").mouseleave( function() {

		if($(this).css("background-image") == ("url(\"http://127.0.0.1/test_eoko/i-love-u/img/loving-hover.png\")"))
		{
			$(this).css("background-image","url(../i-love-u/img/loving.png)");
		}
		else if($(this).css("background-image") == ("url(\"http://127.0.0.1/test_eoko/i-love-u/img/not-loving-hover.png\")"))
		{
			$(this).css("background-image","url(../i-love-u/img/not-loving.png)");
		}
	})
});

function isNewIp()
{
	//récuperation de l'ip
	$.getJSON('https://api.ipify.org?format=json', function(data) {

		//vérification de la présence de l'ip dans le fichier
		$.get('ip_adresses.txt', function(data1) {    
		    var lines = data1.split(";");

		   $.each(lines, function(n, elem) {
		        if(elem == data.ip)
		        {
		        	alert("Sorry you've already sent your like");
					$("button").css("background-image","url(../i-love-u/img/not-loving.png)");
		        }
		    });

		});

	});
}

function loadFiles(ip)
{	
	//appel du fichier php chargé d'enregistrer l'ip
    $(document).load('../i-love-u/traitement.php?ip='+ip);
}