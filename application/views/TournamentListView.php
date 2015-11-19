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
        <form action="TournamentListController" method="post">
            <select name="tournaments" size="5" style="width: 300px">
            <?php 
                if($aTournamentListData != null){
                    foreach($aTournamentListData as $aTournamentListRow){
                        $sContent .= "<option value='".$aTournamentListRow->Google_ID."'>".$aTournamentListRow->Tournament_Name."</option>";
                    }
                    echo $sContent;
                }
                else{
                    echo '<select>Geen data beschikbaar</select>';
                }
            ?> 
            </select>
            <br /><br />
            <button type="submit" name="SelectTournament" class="btn btn-default">Selecteer toernooi</button>
        </form>
    </body>
</html>