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

<table class=".table-bordered">
    <tr>
        <th>Deelnemers</th>
        <th>Aantal gespeelde games</th>
        <th>Gemiddelde score</th>
        <th>Gemiddeld aantal strikes</th>
        <th>Gemiddeld aantal spares</th>
    </tr>

</table>
<form action="MyTournamentController" method="post">
    <button type="submit" name="SelectTournament" class="btn btn-default">Selecteer toernooi</button>
</form>
</div>
</body>
</html>