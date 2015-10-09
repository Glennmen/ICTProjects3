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
    <?php echo $nav ?>

    <?php echo validation_errors()?>

<div class="col-xs-6 col-md-4"> 
    <table class="table"> 
        <tr><th>GameNr</th><th>Totaal</th><th>Strikes</th><th>Sparées</th></tr>
            <?php
                if($aProgressData != null){
                    foreach($aProgressData->result() as $aProgressRow){
                        $sContent =  "<tr><td>".$aProgressRow->Game_ID."</td>";
                        $sContent .=  "<td>".$aProgressRow->Totaal."</td>";
                        $sContent .=  "<td>".$aProgressRow->Strikes."</td>";
                        $sContent .=  "<td>".$aProgressRow->Spare."</td></tr>";
                        echo $sContent;
                    }
                }
                else{
                    echo '<tr><td colspan="4">Geen data beschikbaar</td></tr>';
                }
            ?>
    </table>
</div>


</body>
</html>
