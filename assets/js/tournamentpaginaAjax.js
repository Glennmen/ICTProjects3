$.ajax({
        type: "POST",
        url: "/ICTProjects3/TournamentController/jsonPersonen",
        dataType: 'json',
        data: {},
        success: function(data) {
            personen = document.getElementById('personen');
            personen.options.length = 0;
            $.each(data, function(index, element) {
            personen.options[personen.options.length] = new Option(element.Last_Name + " " + element.First_Name , element.Google_ID);
            personenSelect.bootstrapDualListbox('refresh');
        });
        }
        });