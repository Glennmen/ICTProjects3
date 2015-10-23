<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 7/10/2015
 * Time: 23:54
 */
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.maskedinput.js"></script>
    <script>
          jQuery(function($){
             $("#GameDate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
             $("#GameTime").mask("99:99",{placeholder:"hh:mm"});
    });
    </script>
    <title> GamePagina </title>
</head>
<body>
    
    <?php echo $nav ?>

    <?php echo validation_errors()?>

<div class="col-xs-6 col-md-4"> 
    <form action="GameController" method="post">
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

        <label> Welke soort game? </label>
        <select class="form-control" id="Type" name="type">
            <option value="0">FreeGame</option>
            <option value="1">Tournament</option>
        </select>
        </br>
        <button type="submit" name="CreateGame" class="btn btn-default">Create Game</button>
    </form>
</div>

<form>

</form>


</body>
</html>
