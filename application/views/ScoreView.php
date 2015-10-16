<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css"/>
    <title> ScorePagina </title>
</head>
<body>
    
    <?php echo $nav ?>

    <?php echo validation_errors()?>

<div class="col-xs-6 col-md-4"> 
    <form action="ScoreController" method="post">
        <div class="form-group">
            <label for="Score">Totaal behaalde score:</label>
            <input type="text" class="form-control" id="ScoreTotaal" name="scoreTotaal" value="<?php echo set_value('scoreTotaal'); ?>" placeholder="Totale score">
        </div>

        <div class="form-group">
            <label for="Strikes">Aantal strikes:</label>
            <input type="text" class="form-control" id="ScoreStrikes" name="scoreStrikes" value="<?php echo set_value('scoreStrikes'); ?>" placeholder="Aantal strikes">
        </div>

        <div class="form-group">
            <label for="Spares">Aantal spares:</label>
            <input type="text" class="form-control" id="ScoreSpares" name="scoreSpares" value="<?php echo set_value('scoreSpares'); ?>" placeholder="Aantal spares">
        </div>
        
        </br>
        <button type="submit" name="UploadScore" class="btn btn-default">Upload Score</button>
    </form>
</div>

<form>

</form>


</body>
</html>
