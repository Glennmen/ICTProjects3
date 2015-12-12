<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InvitesPagina</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css'); ?>"/>
    </head>
    <body>
    
    <?php echo $nav ?>
        
    <div class="container">    
        
    <h1>Invites</h1>
         
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#uitnodigingen" aria-controls="uitnodigingen" role="tab" data-toggle="tab">Uitnodigingen</a></li>
          <li role="presentation"><a href="#tourney" aria-controls="tourney" role="tab" data-toggle="tab">Geaccepteerde toernooien</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="uitnodigingen">
                <form action='InvitesController/changeInvites' method='post'>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Toernooi naam</th>
                            <th>Begin datum</th>
                            <th>Eind datum</th>
                            <th>Eigenaar</th>
                            <th>Accept</th>
                            <th>Decline</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sContent = null;
                            if($aInvitesListData != null){
                                foreach($aInvitesListData as $aInvitesListRow){
                                    $sContent .=  "<tr><td>".$aInvitesListRow->Tournament_Name."</td>";
                                    $sContent .=  "<td>".$aInvitesListRow->Start_Date."</td>";
                                    $sContent .=  "<td>".$aInvitesListRow->End_Date."</td>";
                                    $sContent .=  "<td>".$aInvitesListRow->Nickname."</td>";
                                    $sContent .=  "<td><button class='btn btn-default btn-xs' type = 'submit' name ='Accept' value = '".$aInvitesListRow->Tournament_ID."'>Accept</button></td>";
                                    $sContent .=  "<td><button class='btn btn-default btn-xs' type = 'submit' name ='Decline' value = '".$aInvitesListRow->Tournament_ID."'>Decline</button></td>";
                                    $sContent .=  "</tr>";
                                    echo $sContent;
                                }
                            }
                            else{
                                echo '<tr><td colspan="6">Geen data beschikbaar</td></tr>';
                            }
                        ?>
                        </tbody>
                    </table>   
                </form>
            </div>
            
            <div role="tabpanel" class="tab-pane" id="tourney">
                <form action="InvitesController/viewInfo" method="post">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Select</th>
                        <th>Toernooi naam</th>
                        <th>Begin datum</th>
                        <th>Eind datum</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                         if($aTournamentListData != null){
                             foreach($aTournamentListData as $aTournamentListRow){
                                $sContent =  "<tr><td><input name='SelectedTournament' type='radio' required value='".$aTournamentListRow->Tournament_ID."'></td>";
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
                    </tbody>
                    </table>
                    <button type="submit" class="btn btn-default">Selecteer toernooi</button>
                </form>
            </div>
        </div>

    </div>
        
    </div>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/TimeOut.js'); ?>"></script>
    <script>
            $(function () {
                $("tr").click(function () {
                $(this).children().find(":radio").prop('checked', true);
                });
            });
            
            <?php echo $removeUrl ?>
        </script>
    </body>
</html>