<?php
header('Expires:Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified:'.gmdate('D,dMYH:i:s').'GMT');
header('Cache-Control:no-cache, must-revalidate');
header('Pragma: no-cache') ;
header('Access-Control-Allow-Origin:*');
$ip =  $_SERVER['REMOTE_ADDR'];

try{
  $db= new PDO("mysql:host=localhost;dbname=iloveu;charset=utf8mb4","root", "");
}
catch(PDOException $ex){
}

  $req = $db->prepare("INSERT INTO 'love'( 'IP') VALUES (':IP') ");
  $req->execute(array(
    "IP" => $ip
  ));

  $req = $db->query("SELECT * FROM love ");
  $count = 0;
  while($donner = $req->fetch(PDO::FETCH_ASSOC)){
	  $count +=1;
  }
  $count = json_encode($count);
  echo $count;



 ?>
