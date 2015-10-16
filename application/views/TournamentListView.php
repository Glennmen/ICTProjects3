<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
    <?php echo $nav ?>

    <?php echo validation_errors()?>
        <table>
            <tr>
                <th>Toernooi ID</th>
                <th>Toernooi naam</th>
                <th>Begin datum</th>
                <th>Eind datum</th>
                <th>Eigenaar</th>
            </tr>
            
            <?php
                if($aTournamentListData != null){
                    foreach($aTournamentListData->result() as $aTournamentListRow){
                        $sContent =  "<tr><td>".$aTournamentListRow->Toernooi_ID."</td>";
                        $sContent .=  "<td>".$aTournamentListRow->Naam."</td>";
                        $sContent .=  "<td>".$aTournamentListRow->Begin_Datum."</td>";
                        $sContent .=  "<td>".$aTournamentListRow->Eind_Datum."</td></tr>";
                        $sContent .=  "<td>".$aTournamentListRow->Eigenaar_ID."</td></tr>";
                        echo $sContent;
                    }
                }
                else{
                    echo '<tr><td colspan="4">Geen data beschikbaar</td></tr>';
                }
            ?>
        </table>        
            <form action="MyTournamentController" method="post">
                <button type="submit" name="SelectTournament" class="btn btn-default">Selecteer toernooi</button>
            </form>
        </div>
    </body>
</html>