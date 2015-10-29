function getInfo(radio) {
    if (radio.value == "free") {
        document.getElementById("game").style.display = "none";
        $.ajax({
        type: "POST",
        url: "/ICTProjects3/ScoreController/json",
        dataType: 'json',
        data: {GoogleID: 2, Type: 'free', TournooiID: 0},
        success: function(data) {
            tourney = document.getElementById('tourney');
            tourney.options.length = 0;
            $.each(data, function(index, element) {
            tourney.options[tourney.options.length] = new Option(element.Naam + " - " + element.Datum, element.Game_ID);
        });
        document.getElementById("tourney").style.display = "block";
        }
        });
    }
    else if (radio.value == "tourney") {
        $.ajax({
        type: "POST",
        url: "/ICTProjects3/ScoreController/json",
        dataType: 'json',
        data: {GoogleID: 2, Type: 'tourney'},
        success: function(data) {
            tourney = document.getElementById('tourney');
            tourney.options.length = 0;
            $.each(data, function(index, element) {
            tourney.options[tourney.options.length] = new Option(element.Naam , element.toernooiID);
        });
        document.getElementById("tourney").style.display = "block";
        }
        });
    }
}

function getGames() {
    if(document.getElementById('inlineRadio2').checked) {
        var e = document.getElementById("tourney");
        var ID = e.options[e.selectedIndex].value;
  
        $.ajax({
        type: "POST",
        url: "/ICTProjects3/ScoreController/json",
        dataType: 'json',
        data: {GoogleID: 2, TournooiID: ID},
        success: function(data) {
            game = document.getElementById('game');
            game.options.length = 0;
            $.each(data, function(index, element) {
            game.options[game.options.length] = new Option(element.Naam + " - " + element.Datum, element.Game_ID);
        });
        document.getElementById("game").style.display = "block";
        }
        });
    }
}