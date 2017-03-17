$(document).ready(function() {

    $.getJSON('https://api.ipify.org?format=json', function(data) {
    	//alert(data.ip);
	});

	//isNewIp();

	//if is new then not clickable
	if(isNewIp() == false)
	{
		alert("Sorry you've already sent your like");
		$("button").css("background-image","url(../i-love-u/img/not-loving.png)");
		$("button").prop('disabled', true);
	}

	$("button").click( function() {

		alert($(this).css("background-image"));
		if($(this).css("background-image").indexOf("/img/loving.png"))
		{
			alert("click");
			//add the ip
			//add one like
			//change color
			$(this).css("background-image","url(../i-love-u/img/not-loving.png)");
			$(this).prop('disabled', true);
		}
	});

	$("#btn").mouseenter( function() {

		if($(this).css("background-image").indexOf("/img/loving.png"))
		{
			alert("enter red");
			$(this).css("background-image","url(../i-love-u/img/loving-hover.png)");
		}
		else if($(this).css("background-image").indexOf("/img/not-loving.png"))
		{
			alert("enter blue");
			$(this).css("background-image","url(../i-love-u/img/not-loving-hover.png)");
		}
	})

	$("#btn").mouseleave( function() {

		if($(this).css("background-image").indexOf("/img/loving-hover.png"))
		{
			alert("leave red");
			$(this).css("background-image","url(../i-love-u/img/loving.png)");
		}
		else if($(this).css("background-image").indexOf("/img/not-loving-hover.png"))
		{
			alert("leave blue");
			$(this).css("background-image","url(../i-love-u/img/not-loving.png)");
		}
	})
});

function isNewIp()
{
	return true;
}