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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title> GamePagina </title>
</head>
<body>

    <?php echo validation_errors()?>

<div class="col-xs-6 col-md-4"> 
    <form action="GameController" method="post">
        <div class="form-group">
            <label for="GameName">Naam van de Game :</label>
            <input type="text" class="form-control" id="GameName" name="gameName" placeholder="Naam van je game">
        </div>

        <div class="form-group">
            <label for="GameDatum">Datum:</label>
            <input type="date" class="form-control" id="GameDate" name="gameDate" placeholder="Datum van je game">
        </div>

        <div class="form-group">
            <label for="GameTime">Tijd : </label>
            <input type="text" class="form-control" id="GameTime" name="gameTime" placeholder="Exacte starttijd van je game">
        </div>

        <div class="form-group">
            <label for="Locatie">Locatie : </label>
            <input type="text" class="form-control" id="Location" name="location" placeholder="De locatie">
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
