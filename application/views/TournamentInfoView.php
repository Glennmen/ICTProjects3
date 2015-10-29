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
    <title></title>
</head>
<body>

<?php echo $nav ?>

<?php echo validation_errors()?>

<h1></h1>
<div class="col-xs-6 col-md-4">
<table class="table">
    <tr><th>Deelnemers</th><th>Aantal gespeelde games</th><th>Gemiddelde score</th><th>Gemiddeld aantal strikes</th><th>Gemiddeld aantal spares</th></tr>
        <?php
            if($aParticipants != NULL) {
                foreach($aParticipants->result() as $aParticipantRow) {
                    $sContent = "<tr><td>".$aParticipantRow->Vnaam."</td>";
                    $sContent .= "<td>".$aParticipantRow->Fnaam."</td>";
                    $sContent .= "<td>".$aParticipantRow->Google_ID."</td></tr>";
                    echo $sContent;      
                }
            } else {
                echo '<tr><td colspan="4">Geen data beschikbaar</td></tr>';
            }
        ?>
   <!-- <tr>
        <th>Deelnemers</th>
        <th>Aantal gespeelde games</th>
        <th>Gemiddelde score</th>
        <th>Gemiddeld aantal strikes</th>
        <th>Gemiddeld aantal spares</th>
    </tr>
   -->

</table>
</div>
</body>
</html>