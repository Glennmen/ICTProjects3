function getInfo(radio) {
if (radio.value == "tourney") {
        $("#button").prop('disabled', true);
        $.ajax({
        type: "POST",
        url: "/ICTProjects3/GameController/json",
        dataType: 'json',
        data: {GoogleID: 2},
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
    else {
        $("#button").prop('disabled', false);
        document.getElementById("tourneyDiv").style.display = "none";
    }
}

function getGames() {
    $("#button").prop('disabled', false);
}