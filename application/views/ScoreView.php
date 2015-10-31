<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ScorePagina</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css"/>
</head>
<body>
    
    <?php echo $nav ?>

    <h1>Score toevoegen</h1>
    
    <?php echo validation_errors()?>
    <?php echo $alert ?>

<div class="col-xs-6 col-md-4"> 
    <form action="ScoreController" method="post">
        <div class="form-group">
            <label for="Score">Totaal behaalde score:</label>
            <input type="text" class="form-control" id="ScoreTotaal" name="scoreTotaal" value="<?php echo set_value('scoreTotaal'); ?>" placeholder="Totaal">
        </div>

        <div class="form-group">
            <label for="Strikes">Aantal strikes:</label>
            <input type="text" class="form-control" id="ScoreStrikes" name="scoreStrikes" value="<?php echo set_value('scoreStrikes'); ?>" placeholder="Strikes">
        </div>

        <div class="form-group">
            <label for="Spares">Aantal spares:</label>
            <input type="text" class="form-control" id="ScoreSpares" name="scoreSpares" value="<?php echo set_value('scoreSpares'); ?>" placeholder="Spares">
        </div>
        
        <div class="form-group">
            <label class="radio-inline">
              <input type="radio" name="type" id="inlineRadio1" onclick="getInfo(this);" value="free"> Free
            </label>
            <label class="radio-inline">
              <input type="radio" name="type" id="inlineRadio2" onclick="getInfo(this);" value="tourney"> Tourney
            </label>
        </div>
        
        <div class="form-group" style="display: none" id="tourneyDiv">
        <label for="tourney" id="tourneyLabel"></label>
        <select id="tourney" name="Tourney" multiple class="form-control"  onchange="getGames()">

          </select>
        </div>
        
        <div class="form-group" style="display: none" id="gameDiv">
        <label for="game" id="gameLabel"></label>
        <select id="game" name="Game" multiple class="form-control" onchange="getGames2()">

          </select>
        </div>

        <button type="submit" name="UploadScore" id="button" class="btn btn-default" disabled>Upload Score</button>
    </form>
</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/scorepaginaAjax.js'); ?>"></script>
</body>
</html>
