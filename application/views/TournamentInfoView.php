<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InfoPagina</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css'); ?>"/>
    </head>
<body>

<?php echo $nav ?>
    
<div class="container">

<h1>Tournament Info</h1>

<table class="table table-striped">
    <thead>
    <tr><th>Voornaam</th><th>Achternaam</th><th>Aantal gespeelde games</th><th>Gemiddelde score</th><th>Gemiddeld aantal strikes</th><th>Gemiddeld aantal spares</th></tr>
    </thead>
    <tbody>
   <?php
            if($aParticipants != NULL) {
                foreach($aParticipants->result() as $aParticipantRow) {
                    $sContent = "<tr><td>".$aParticipantRow->Last_Name."</td>";
                    $sContent .= "<td>".$aParticipantRow->First_Name."</td>";
                    $sContent .= "<td>".$aParticipantRow->aantalGames."</td>";
                    $sContent .= "<td>".round($aParticipantRow->gemTotaal, 1)."</td>";
                    $sContent .= "<td>".round($aParticipantRow->gemStrikes, 1)."</td>";
                    $sContent .= "<td>".round($aParticipantRow->gemSpare, 1)."</td>";
                    echo $sContent;      
                }
            } 
            else {
                echo '<tr><td colspan="4">Geen data beschikbaar</td></tr>';
            }
        ?>
    </tbody>
</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/TimeOut.js'); ?>"></script>
<script>      
    if (typeof window.history.replaceState == 'function') {
        history.replaceState({}, '', window.location.href.slice(0, -9));
    }
</script>
</body>
</html>