$("#loveButton").click(function(){
  var love = 0
  if($("#loveButton").hasClass("send")){
    alert("Vous avez déjà remplie le monde d'amour")
  }
  else{
    $.ajax({
      url: "api/php/api.php",
      datatype: "json",
      method: "post"
    }).done(function(data){

      $("#loveButton").toggleClass("send")
      $("#loveCount").append("<p>" + data + "</p>")
    })
  }
});
