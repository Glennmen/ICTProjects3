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
        <title>Tournament List</title>
    </head>
    <body>
    
    <?php echo $nav ?>
    <?php echo validation_errors()?>
        <form action="TournamentListController" method="post">
        <table>
            <tr>
                <th>Select</th>
                <th>Toernooi naam</th>
                <th>Begin datum</th>
                <th>Eind datum</th>
            </tr>
            <?php 
                 if($aTournamentListData != null){
                     foreach($aTournamentListData as $aTournamentListRow){
                        $sContent =  "<tr><td><input name='Selected' type='radio' value='1".$aTournamentListRow->Tournament_ID."'></td>";
                        $sContent .=  "<td>".$aTournamentListRow->Tournament_Name."</td>";
                        $sContent .=  "<td>".$aTournamentListRow->Start_Date."</td>";
                        $sContent .=  "<td>".$aTournamentListRow->End_Date."</td></tr>";
                        echo $sContent;
                     }
                 }
                 else{
                    echo '<tr><td colspan="4">Geen data beschikbaar</td></tr>';
                 }
                 ?>
            </table>
            <button type="submit" name="SelectTournament" class="btn btn-default">Selecteer toernooi</button>
        </form>
        <script>
            $(function () {
                $("tr").click(function () {
                $(this).children().find(":radio").prop('checked', true);
                })
            })
        </script>
    </body>
</html>