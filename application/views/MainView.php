<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MainPagina</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css"/>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css'); ?>"/>
</head>
<body>
    
    <?php echo $nav ?>
    <?php echo $popup ?>
<div class="container">

    <h1> Welkom  <?php echo $First_Name,' ',$Last_Name ?> </h1>

    
    <div class="menu">
        <a class="orange large" href="ProgressController"><img src="<?php echo $chart ?>" alt="Progress chart"></a>
        <a class="green" href="#" title="Home"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
        <a class="blue" href="InvitesController" title="Uitnodiging"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><span class="badge"><?php echo $uitnodigingen ?></span></a>
        <a class="pink" href="TournamentController">Toernooi aanmaken</a>
        <a class="purple" href="GameController">Game aanmaken</a>
        <a class="red" href="ScoreController">Score toevoegen</a>
    </div>    
    
</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/TimeOut.js'); ?>"></script>
    <script>
        $(window).load(function(){$("#myModal").modal("show");});
        document.getElementById("alert").style.display = "none";
        function button(){
           personen = document.getElementById('nicknameText');
           if (personen.value) {
               document.getElementById("alert").style.display = "none";
               $("#btnSubmit").prop('disabled', false);
           }
           else{
               document.getElementById("alert").style.display = "block";
               $("#btnSubmit").prop('disabled', true);
           } 
           $('#btnSubmit').click(function(){
               $('#nicknameform').submit();
           });
         }
        </script>
</body>
</html>
