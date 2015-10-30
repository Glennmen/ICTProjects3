<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css"/>
        <title>Tournament list</title>
    </head>
    <body>
    
    <?php echo $nav ?>
    <?php echo validation_errors()?>
        <form action="TournamentInfoController" method="post">
            <select name="tournaments" size="5" style="width: 300px">
            <?php 
                if($aTournamentListData != null){
                    foreach($aTournamentListData->result() as $aTournamentListRow){
                        $sContent .= "<option value='".$aTournamentListRow->Eigenaar_ID."'>".$aTournamentListRow->Naam."</option>";
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