<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MainPagina</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css'); ?>"/>
</head>
<body>
    
    <?php echo $nav ?>

<div class="container">

    <h1> Name is  <?php echo $First_Name,$Last_Name ?> </h1>

    
    <div class="menu">
        <a class="orange large" href="#"><img src="<?php echo $chart ?>" alt="Progress chart"></a>
        <a class="green" href="#" title="Home"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
        <a class="blue" href="#" title="Uitnodiging"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><span class="badge"><?php echo $uitnodigingen ?></span></a>
        <a class="pink" href="TournamentController">Toernooi aanmaken</a>
        <a class="purple" href="GameController">Game aanmaken</a>
        <a class="red" href="ScoreController">Score toevoegen</a>
    </div>    
    
</div>
    
    
</body>
</html>
