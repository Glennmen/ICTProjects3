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
    <table> 
        <tr><th>GameNr</th><th>Totaal</th><th>Strikes</th><th>Sparées</th></tr>
            <?php
                $this->load->model('Progress_model');
                $aProgressData = $this->Progress_model->StatistiekenOphalen(1);
                if($aProgressData != null){
                    foreach($aProgressRow as $aProgressData){
                        $sContent =  "<tr><td>".$aProgressRow->GameID."</td>";
                        $sContent .=  "<td>".$aProgressRow->Totaal."</td>";
                        $sContent .=  "<td>".$aProgressRow->Strikes."</td>";
                        $sContent .=  "<td>".$aProgressRow->Spares."</td></tr>";
                        echo $sContent;
                    }
                }
                else{
                    echo '<tr><td colspan="4">Geen data beschikbaar</td><td></td></tr>';
                }
            ?>
    </table>
</div>

<form>

</form>


</body>
</html>
