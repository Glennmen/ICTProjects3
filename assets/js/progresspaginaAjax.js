$.ajax({
type: "POST",
url: "/ICTProjects3/ProgressController/json",
dataType: 'json',
data: {GoogleID: 1, Type: 'free'},
success: function(data) {
    game = document.getElementById('gameSelect');
    game.options.length = 0;
    $.each(data, function(index, element) {
    game.options[game.options.length] = new Option(element.Game_Name + " - " + element.Date, element.Game_ID);
});
}
});

$.ajax({
type: "POST",
url: "/ICTProjects3/ProgressController/json",
dataType: 'json',
data: {GoogleID: 1, Type: 'tourney'},
success: function(data) {
    tourney = document.getElementById('tourneySelect');
    tourney.options.length = 0;
    $.each(data, function(index, element) {
    tourney.options[tourney.options.length] = new Option(element.Tournament_Name , element.Tournament_ID);
});
}
});

function getProgress1() {
    var e = document.getElementById("gameSelect");
    var ID = e.options[e.selectedIndex].value;
    
    $.ajax({
    type: "POST",
    url: "/ICTProjects3/ProgressController/json",
    dataType: 'json',
    data: {GameID: ID, Type: 'freeProgress'},
    success: function(data) {
        if(!data.length) {
            document.getElementById("gameDiv2").style.display = "none";
            document.getElementById("alert1").style.display = "block";
        }
        else {
        var table = document.getElementById("gameTable").getElementsByTagName('tbody')[0];
        $.each(data, function(index, element) {
            document.getElementById("gameDiv2").style.display = "block";
            document.getElementById("alert1").style.display = "none";
            if (table.rows[index]){
                table.deleteRow(index);
            }

            var row = table.insertRow(index);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);

            cell1.innerHTML = index + 1;
            cell2.innerHTML = element.Nickname;
            cell3.innerHTML = element.Total;
            cell4.innerHTML = element.Strikes;
            cell5.innerHTML = element.Spares;
            });
        }
    }
    });  
}

function getProgress2() {
    var e = document.getElementById("tourneySelect");
    var ID = e.options[e.selectedIndex].value;
    
    $.ajax({
    type: "POST",
    url: "/ICTProjects3/ProgressController/json",
    dataType: 'json',
    data: {TournamentID: ID, Type: 'tourneyProgress'},
    success: function(data) {
        if(!data.length) {
            document.getElementById("tourneyDiv2").style.display = "none";
            document.getElementById("alert2").style.display = "block";
        }
        else {
        var table = document.getElementById("tourneyTable").getElementsByTagName('tbody')[0];
        $.each(data, function(index, element) {
            document.getElementById("tourneyDiv2").style.display = "block";
            document.getElementById("alert2").style.display = "none";
            if (table.rows[index]){
                table.deleteRow(index);
            }

            var row = table.insertRow(index);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);

            cell1.innerHTML = index + 1;
            cell2.innerHTML = element.Nickname;
            cell3.innerHTML = element.Total;
            cell4.innerHTML = element.Strikes;
            cell5.innerHTML = element.Spares;
            });
        }
    }
    });  
}