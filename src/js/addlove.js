$(window).load(function(){
$(document).ready(function () {
    $("#addlove").button();
    $("#addlove").click(function () {
        $("#addlove").button('reset').addClass("btn-circleblue");
        $("#addlove").button('reset').addClass("btn-circlebluefocus");
        $.ajax({
                type: 'POST',
                url: 'addlove.php',
            });
    	});
	});
});