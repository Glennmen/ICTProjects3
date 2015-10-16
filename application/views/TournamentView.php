<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title> ToernooiPagina </title>
</head>
<body>
    
    <?php echo $nav ?>

    <?php echo validation_errors()?>

<div class="col-xs-6 col-md-4"> 
    <form action="ToernooiController" method="post">
        <div class="form-group">
            <label for="TournamentName">Toernooi naam:</label>
            <input type="text" class="form-control" id="TournamentName" name="tournamentName" value="<?php echo set_value('tournamentName'); ?>" placeholder="Naam van toernooi">
        </div>

        <div class="form-group">
            <label for="StartDate">Toernooi begindatum:</label>
            <input type="date" class="form-control" id="TournamentStartDate" name="tournamentStartDate" value="<?php echo set_value('tournamentStartDate'); ?>" placeholder="Begindatum">
        </div>

        <div class="form-group">
            <label for="EndDate">Toernooi einddatum:</label>
            <input type="date" class="form-control" id="TournamentEndDate" name="tournamentEndDate" value="<?php echo set_value('tournamentEndDate'); ?>" placeholder="Einddatum">
        </div>
        
        </br>
        <button type="submit" name="CreateToernooi" class="btn btn-default">Maak toernooi aan</button>
    </form>
</div>
</body>
</html>
