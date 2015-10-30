function getInfo(radio) {
    if (radio.value == "free") {
        $("#button").prop('disabled', true);
        document.getElementById("gameDiv").style.display = "none";
        $.ajax({
        type: "POST",
        url: "/ICTProjects3/ScoreController/json",
        dataType: 'json',
        data: {GoogleID: 2, Type: 'free'},
        success: function(data) {
            tourney = document.getElementById('tourney');
            tourney.options.length = 0;
            $.each(data, function(index, element) {
            tourney.options[tourney.options.length] = new Option(element.Naam + " - " + element.Datum, element.Game_ID);
        });
        document.getElementById("tourneyLabel").innerHTML = "Select game:";
        document.getElementById("tourneyDiv").style.display = "block";
        }
        });
    }
    else if (radio.value == "tourney") {
        $("#button").prop('disabled', true);
        $.ajax({
        type: "POST",
        url: "/ICTProjects3/ScoreController/json",
        dataType: 'json',
        data: {GoogleID: 2, Type: 'tourney'},
        success: function(data) {
            tourney = document.getElementById('tourney');
            tourney.options.length = 0;
            $.each(data, function(index, element) {
            tourney.options[tourney.options.length] = new Option(element.Naam , element.Toernooi_ID);
        });
        document.getElementById("tourneyLabel").innerHTML = "Select toernooi:";
        document.getElementById("tourneyDiv").style.display = "block";
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
        document.getElementById("gameLabel").innerHTML = "Select game:";
        document.getElementById("gameDiv").style.display = "block";
        }
        });
    }
    else if(document.getElementById('inlineRadio1').checked) {
        $("#button").prop('disabled', false);
    }
}

function getGames2() {
    $("#button").prop('disabled', false);
}