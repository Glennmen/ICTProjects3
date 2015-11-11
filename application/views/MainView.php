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

    <h1>Bowling</h1>

    
    <div class="menu">
        <a class="orange large" href="#">Stats</a>
        <a class="green" href="#">Profiel</a>
        <a class="blue" href="#">Uitnodigingen</a>
        <a class="pink" href="TournamentController">Toernooi aanmaken</a>
        <a class="purple" href="GameController">Game aanmaken</a>
        <a class="red" href="ScoreController">Score toevoegen</a>
    </div>    
    
</div>
    
    
</body>
</html>
