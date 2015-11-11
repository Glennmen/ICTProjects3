<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inloggen</title>
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sidebar.css'); ?>"/>
</head>
<body>

<?php echo $nav ?>

<div class="container">

    <h1>Score toevoegen</h1>

    <?php echo validation_errors() ?>
    <?php echo $inhoud ?>

    <div class="col-xs-6 col-md-4">

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/scorepaginaAjax.js'); ?>"></script>
</body>
</html>
