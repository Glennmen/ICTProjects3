$.ajax({
        type: "POST",
        url: "/ICTProjects3/TournamentController/jsonPersonen",
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
function select() {
    personen = document.getElementById('personen');
    if (personen.value) {
        $("#button").prop('disabled', false);
    }
    else {
        $("#button").prop('disabled', true);
    }
}