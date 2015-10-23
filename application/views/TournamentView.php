<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css"/>
    <title> ToernooiPagina </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.maskedinput.js"></script>
    <script>
          jQuery(function($){
             $("#TournamentStartDate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
             $("#TournamentEndDate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
    });</script>
</head>
<body>
    
    <?php echo $nav ?>
    <?php echo validation_errors()?>

<div class="col-xs-6 col-md-4"> 
    <form action="TournamentController" method="post">
        <div class="form-group">
            <label for="TournamentName">Toernooi naam:</label>
            <input type="text" class="form-control" id="TournamentName" name="tournamentName" value="<?php echo set_value('tournamentName'); ?>" placeholder="Naam van toernooi">
        </div>

        <div class="form-group">
            <label for="StartDate">Toernooi begindatum:</label>
            <input type="text" class="form-control" id="TournamentStartDate" name="tournamentStartDate" value="<?php echo set_value('tournamentStartDate'); ?>" placeholder="Begindatum">
        </div>

        <div class="form-group">
            <label for="EndDate">Toernooi einddatum:</label>
            <input type="text" class="form-control" id="TournamentEndDate" name="tournamentEndDate" value="<?php echo set_value('tournamentEndDate'); ?>" placeholder="Einddatum">
        </div>
        
        </br>
        <button type="submit" name="CreateTournament" class="btn btn-default">Maak toernooi aan</button>
    </form>
</div>
</body>
</html>
