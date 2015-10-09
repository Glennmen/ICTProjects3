<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title> ScorePagina </title>
</head>
<body>

    <?php echo validation_errors()?>

<div class="col-xs-6 col-md-4"> 
    <form action="ScoreController" method="post">
        <div class="form-group">
            <label for="Score">Totaal behaalde score:</label>
            <input type="text" class="form-control" id="ScoreTotaal" name="scoreTotaal" placeholder="Totale score">
        </div>

        <div class="form-group">
            <label for="Strikes">Aantal strikes:</label>
            <input type="text" class="form-control" id="ScoreStrikes" name="scoreStrikes" placeholder="Aantal strikes">
        </div>

        <div class="form-group">
            <label for="Spares">Aantal spares:</label>
            <input type="text" class="form-control" id="ScoreSpares" name="scoreSpares" placeholder="Aantal spares">
        </div>
        
        </br>
        <button type="submit" name="UploadScore" class="btn btn-default">Upload Score</button>
    </form>
</div>

<form>

</form>


</body>
</html>
