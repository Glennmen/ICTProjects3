<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ScorePagina </title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css'); ?>"/>
</head>
<body>
    <?php echo $nav ?>
    
    <div class="container">
    
    <h1>Progress</h1>

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#free" aria-controls="free" role="tab" data-toggle="tab">Free</a></li>
          <li role="presentation"><a href="#tourney" aria-controls="tourney" role="tab" data-toggle="tab">Tourney</a></li>
          <li role="presentation"><a href="#overal" aria-controls="overal" role="tab" data-toggle="tab">Overal</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="free">
                <div class="row">
                <div class="form-group col-xs-4" id="gameDiv">
                <label for="game" id="gameLabel">Select game:</label>
                <select id="gameSelect" name="Game" multiple class="form-control" onchange="getProgress1()">

                </select>
                </div>
                </div>
                <div id="alert1" class="alert alert-info" role="alert" style="display: none">Geen scores beschikbaar.</div>
                <div class="row">
                <div class="form-group col-xs-6" id="gameDiv2" style="display: none">
                <table class="table table-striped" id="gameTable">
                    <thead>
                        <tr><td>#</td><td>Nickname</td><td>Score</td><td>Strikes</td><td>Spares</td></tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tourney">
                <div class="row">
                <div class="form-group col-xs-4" id="tourneyDiv">
                <label for="tourney" id="tourneyLabel">Select Tourney:</label>
                <select id="tourneySelect" name="Tourney" multiple class="form-control" onchange="getProgress2()">

                </select>
                </div>
                </div>
                <div id="alert2" class="alert alert-info" role="alert" style="display: none">Geen scores beschikbaar.</div>
                <div class="row">
                <div class="form-group col-xs-6" id="tourneyDiv2" style="display: none">
                <table class="table table-striped" id="tourneyTable">
                    <thead>
                        <tr><td>#</td><td>Nickname</td><td>Score</td><td>Strikes</td><td>Spares</td></tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="overal">
                <div class="row">
                    <div class="col-xs-4">
                        <img src="<?php echo $chart1 ?>" alt="Progress total chart">
                    </div>
                    <div class="col-xs-4">
                        <img src="<?php echo $chart2 ?>" alt="Progress strikes chart">
                    </div>
                    <div class="col-xs-4">
                        <img src="<?php echo $chart3 ?>" alt="Progress spares chart">
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/progresspaginaAjax.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/TimeOut.js'); ?>"></script>
</body>
</html>
