<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ToernooiPagina </title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/duallistbox.min.css"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/duallistbox.min.js"></script>
    <script>
          jQuery(function($){
             $("#TournamentStartDate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
             $("#TournamentEndDate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
    });</script>
</head>
<body>
    
    <?php echo $nav ?>
    
    <div class="container">
    
    <h1>Toernooi aanmaken</h1>
    
    <?php echo validation_errors()?>
    <?php echo $alert ?>

    <form action="TournamentController" method="post">
    
<div class="col-xs-6 col-md-4"> 
    
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

</div>
        
        <div class="col-xs-6 col-md-5 col-md-offset-2"> 
        <label for="personen">Deelnemers:</label>
        <select id="personen" multiple size="10" name="Personen[]" class="form-control">

            </select>

          <script>
            var personenSelect = $('select[name="Personen[]"]').bootstrapDualListbox();
            
          </script>
    </div>
        
    </form>
    </div>
    <script src="<?php echo base_url('assets/js/tournamentpaginaAjax.js'); ?>"></script>
</body>
</html>
