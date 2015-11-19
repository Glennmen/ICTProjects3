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
        document.getElementById("gameDiv2").style.display = "block";
    // Find a <table> element with id="myTable":
var table = document.getElementById("myTable");

// Create an empty <tr> element and add it to the 1st position of the table:
var row = table.insertRow(0);

// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);

// Add some text to the new cells:
cell1.innerHTML = "NEW CELL1";
cell2.innerHTML = "NEW CELL2";
}