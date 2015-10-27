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
        <title>Invites</title>
    </head>
    <body>
    
    <?php echo $nav ?>

    <?php echo validation_errors()?>
        
        <table>
            <tr>
                <th>Toernooi naam</th>
                <th>Begin datum</th>
                <th>Eind datum</th>
                <th>Eigenaar</th>
                <th>Accept</th>
                <th>Decline</th>
            </tr>

            <?php
                $sContent = null;
                if($aTournamentListData != null){
                    foreach($aTournamentListData->result() as $aTournamentListRow){
                        $sContent .=  "<tr><td>".$aTournamentListRow->Naam."</td>";
                        $sContent .=  "<td>".$aTournamentListRow->Begin_Datum."</td>";
                        $sContent .=  "<td>".$aTournamentListRow->Eind_Datum."</td>";
                        $sContent .=  "<td>".$aTournamentListRow->Eigenaar_ID."</td>";
                        $sContent .=  "<form action='AcceptedController' method='post'>";
                        $sContent .=  "<td><button type = 'submit' name = 'Accept".$aTournamentListRow->Toernooi_ID."'>Accept</button></td>";
                        $sContent .=  "<td><button type = 'submit' name = 'Decline".$aTournamentListRow->Toernooi_ID."'>Decline</button></td>";
                        $sContent .=  "</form></tr>";
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