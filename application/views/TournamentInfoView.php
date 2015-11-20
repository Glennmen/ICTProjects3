<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title></title>
</head>
<body>

<?php echo $nav ?>

<?php echo validation_errors()?>

<h1></h1>
<div class="col-xs-6 col-md-4">
<table class="table">
    <tr><th>Voornaam</th><th>Achternaam</th><th>Aantal gespeelde games</th><th>Gemiddelde score</th><th>Gemiddeld aantal strikes</th><th>Gemiddeld aantal spares</th></tr>
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
</table>
</div>
</body>
<script src="<?php echo base_url('assets/js/TimeOut.js'); ?>"></script>
</html>