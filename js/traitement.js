$(document).ready(function() {


	//désactivation du boutton au chargement du boutton avant de vérifier l'ip
	$("button").prop('disabled', true);

	isNewIp();

	$("button").prop('disabled', false);

	//action au click du bouton
	$("button").click( function() {
		if($(this).css("background-image").indexOf("/img/loving-hover.png") > 0)
		{
			$(this).css("background-image","url(./img/not-loving-hover.png)");

			$.getJSON('https://api.ipify.org?format=json', function(data){
    			loadFiles(data.ip);
			});
		}
	});

	//evenement lorsque la souris passe sur le bouton
	$("#btn").mouseenter( function() {

		if($(this).css("background-image").indexOf("/img/loving.png") > 0)
		{
			$(this).css("background-image","url(./img/loving-hover.png)");
		}
		else if($(this).css("background-image").indexOf("/img/not-loving.png") > 0)
		{
			$(this).css("background-image","url(./img/not-loving-hover.png)");
		}
	})

	//evenement lorsque la souris n'est plus sur le bouton
	$("#btn").mouseleave( function() {

		if($(this).css("background-image").indexOf("/img/loving-hover.png") > 0)
		{
			$(this).css("background-image","url(./img/loving.png)");
		}
		else if($(this).css("background-image").indexOf("/img/not-loving-hover.png") > 0)
		{
			$(this).css("background-image","url(./img/not-loving.png)");
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
					$("button").css("background-image","url(./img/not-loving.png)");
		        }
		    });

		});

	});
}

function loadFiles(ip)
{	
	//appel du fichier php chargé d'enregistrer l'ip
    $(document).load('./traitement.php?ip='+ip);
}