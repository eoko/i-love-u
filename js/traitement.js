$(document).ready(function() {

	var ip;

    $.getJSON('https://api.ipify.org?format=json', function(data) {
    	//alert(data.ip);
    	ip = data.ip;

	});

	//isNewIp();

	//if is new then not clickable
	if(isNewIp() == false)
	{
		alert("Sorry you've already sent your like");
		$("button").css("background-image","url(../i-love-u/img/not-loving.png)");
		$("button").prop('disabled', true);
	}

	$("input").val(ip);
	$("button").click( function() {

		if($(this).css("background-image") == ("url(\"http://127.0.0.1/test_eoko/i-love-u/img/loving-hover.png\")"))
		{
			//add the ip
			//add one like
			//change color
			$(this).css("background-image","url(../i-love-u/img/not-loving-hover.png)");
			//$(this).prop('disabled', true);
		}
	});

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
	jQuery.get('ip_adresses.txt', function(data) {
   		alert(data);
   		//process text file line by line
   		//$('#div').html(data.replace('n',''));

   		if(ip == f)
   		//	return false
   			alerrt("there");
	});
	return true;
}