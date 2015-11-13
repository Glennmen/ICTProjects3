<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GamePagina</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/duallistbox.min.css"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/duallistbox.min.js"></script>
    <script>
          jQuery(function($){
             $("#GameDate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
             $("#GameTime").mask("99:99",{placeholder:"hh:mm"});
    });
    </script>
</head>
<body>
    
    <?php echo $nav ?>

    <div class="container">
    
    <h1>Game aanmaken</h1>
    
    <?php echo validation_errors()?>
    <?php echo $alert ?>

<form id="form" action="GameController" method="post">    
    
    <div class="col-xs-6 col-md-4"> 
    
        <div class="form-group">
            <label for="GameName">Naam van de Game :</label>
            <input type="text" class="form-control" id="GameName" name="gameName" value="<?php echo set_value('gameName'); ?>" placeholder="Naam van je game">
        </div>

        <div class="form-group">
            <label for="GameDatum">Datum:</label>
            <input type="text" class="form-control" id="GameDate" name="gameDate" value="<?php echo set_value('gameDate'); ?>" placeholder="Datum">
        </div>

        <div class="form-group">
            <label for="GameTime">Tijd : </label>
            <input type="text" class="form-control" id="GameTime" name="gameTime" value="<?php echo set_value('gameTime'); ?>" placeholder="Exacte starttijd van je game">
        </div>

        <div class="form-group">
            <label for="Locatie">Locatie : </label>
            <input type="text" class="form-control" id="Location" name="location" value="<?php echo set_value('location'); ?>" placeholder="De locatie">
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
        
        <button type="submit" name="CreateGame" id="button" class="btn btn-default" disabled>Create Game</button>
    
    </div>

    <div class="col-xs-6 col-md-5 col-md-offset-2"> 
        <label for="personen">Deelnemers:</label>
        <select id="personen" multiple size="10" name="Personen[]" class="form-control" onchange="select()">

            </select>

          <script>
            var personenSelect = $('select[name="Personen[]"]').bootstrapDualListbox();
            
          </script>
    </div>
    
</form>
    
    </div>
    
<script src="<?php echo base_url('assets/js/gamepaginaAjax.js'); ?>"></script>
</body>
</html>
