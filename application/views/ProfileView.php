<?php

?>

<html>
    
    <head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.maskedinput.js"></script>
       
    <title>Profiel Pagina</title>
        
    </head>
    
    <body>
        
    <?php echo $nav ?>

    <?php echo validation_errors()?>
        
        
        <h1>Profiel</h1>
        
        <div class="col-xs-6 col-md-4">
        
        <form action="ProfileController" method="post">
            <div class="form-group">
            <label for="Last_Name">Achternaam:</label>
            <input type="text" class="form-control" id="Last_Name" name="Last_Name" value="<?php echo set_value('Last_Name'); ?>" placeholder="Achternaam">
            </div>
            
            <div class="form-group">
            <label for="First_Name">Voornaam:</label>
            <input type="text" class="form-control" id="First_Name" name="First_Name" value="<?php echo set_value('First_Name'); ?>" placeholder="Voornaam">
            </div>
            
             <div class="form-group">
            <label for="Email">Email:</label>
            <input type="text" class="form-control" id="Email" name="Email" value="<?php echo set_value('Email'); ?>" placeholder="E-mail">
            </div>
            
             <div class="form-group">
            <label for="Nickname">Nickname:</label>
            <input type="text" class="form-control" id="Nickname" name="Nickname" value="<?php echo set_value('Nickname'); ?>" placeholder="Nickname">
            </div>
            
             <div class="form-group">
            <label for="GSM">GSM nummer:</label>
            <input type="text" class="form-control" id="GSM" name="GSM" value="<?php echo set_value('GSM'); ?>" placeholder="GSM nummer">
            </div>
        
        <br>
        <button type="submit" name="UpdateProfile" class="btn btn-default">Update Profiel</button>
        
        </form>
        </div>
        
        
    </body>
    
</html>