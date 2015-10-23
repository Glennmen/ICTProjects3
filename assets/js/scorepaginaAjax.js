function getInfo(radio) {
    if (radio.value == "free") {
        $.ajax({
        type: "POST",
        url: "/ICTProjects3/GameController/json",
        dataType: 'json',
        data: {GoogleID: 2},
        success: function(res) {
            
        }
        });
    }
    else {
        
    }
}