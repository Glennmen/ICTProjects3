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


<div class="col-xs-6 col-md-4"> <form>
        <div class="form-group">
            <label for="GameName">Naam van de Game :</label>
            <input type="text" class="form-control" id="GameName" placeholder="Naam van je game" required>
        </div>

        <div class="form-group">
            <label for="GameDatum">Datum:</label>
            <input type="date" class="form-control" id="GameDate" placeholder="Datum van je game" required>
        </div>

        <div class="form-group">
            <label for="GameTime">Tijd : </label>
            <input type="text" class="form-control" id="GameTime" placeholder="Exacte starttijd van je game" required>
        </div>

        <div class="form-group">
            <label for="Locatie">Locatie : </label>
            <input type="text" class="form-control" id="Location" placeholder="De locatie" required>
        </div>

        <label> Welke soort game? </label>
        <select class="form-control">
            <option>FreeGame</option>
            <option>Tournament</option>
        </select>
        </br>
        <button type="submit" name="CreateGame" class="btn btn-default">Create Game</button>

    </form>
</div>



<form>

</form>


</body>
</html>
