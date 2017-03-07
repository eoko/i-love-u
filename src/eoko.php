<?php
$monfichier = fopen('compteur.txt', 'r+');
 
$love_count = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
 
fclose($monfichier);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eoko test</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="css/eokotest.css" rel="stylesheet">
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.js'></script>
    <script src="js/addlove.js"></script>
    <?php include('clique.php'); ?>
    

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Test Eoko</h1>
                        <p class="intro-text">A love button for everyone.
                            <br>Created with Love <3</p>
                        <a class="btn btn-circle<?= $liked ? ' btn-circleblue btn-circlebluefocus' : '' ?>" id="addlove"><i class="fa fa-heart animated"></i></a>
                        </a>
                    </div>
                </div>
                <?php echo '<p><font color=red>You have ' . $love_count . ' Love <3 !</font></p>'; ?>
            </div>
        </div>
    </header>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
</body>
</html>
