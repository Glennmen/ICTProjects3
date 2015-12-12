function getInfo(radio) {
if (radio.value == "tourney") {
        $("#button").prop('disabled', true);
        $.ajax({
        type: "POST",
        url: "/GameController/json",
        dataType: 'json',
        data: {},
        success: function(data) {
            tourney = document.getElementById('tourney');
            tourney.options.length = 0;
            $.each(data, function(index, element) {
            tourney.options[tourney.options.length] = new Option(element.Tournament_Name , element.Tournament_ID);
        });
        document.getElementById("tourneyLabel").innerHTML = "Select toernooi:";
        document.getElementById("tourneyDiv").style.display = "block";
        personen.options.length = 0;
        personenSelect.bootstrapDualListbox('refresh');
        }
        });
    }
    else {
        $("#button").prop('disabled', true);
        document.getElementById("tourneyDiv").style.display = "none";
        $.ajax({
        type: "POST",
        url: "/GameController/jsonPersonen",
        dataType: 'json',
        data: {},
        success: function(data) {
            personen = document.getElementById('personen');
            personen.options.length = 0;
            $.each(data, function(index, element) {
            personen.options[personen.options.length] = new Option(element.Nickname , element.Google_ID);
            personenSelect.bootstrapDualListbox('refresh');
        });
        }
        });
    }
}

function getGames() {
    $("#button").prop('disabled', true);
    var e = document.getElementById("tourney");
    var ID = e.options[e.selectedIndex].value;
    $.ajax({
        type: "POST",
        url: "/GameController/jsonPersonen",
        dataType: 'json',
        data: {TournooiID: ID, Type: 'tourney'},
        success: function(data) {
            personen = document.getElementById('personen');
            personen.options.length = 0;
            $.each(data, function(index, element) {
            personen.options[personen.options.length] = new Option(element.Nickname , element.Google_ID);
            personenSelect.bootstrapDualListbox('refresh');
        });
        }
        });
}

function select() {
    personen = document.getElementById('personen');
    if (personen.value) {
        $("#button").prop('disabled', false);
    }
    else {
        $("#button").prop('disabled', true);
    }
}