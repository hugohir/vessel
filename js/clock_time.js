$(document).ready(function(){
    $.ajax({
        url: "http://api.timezonedb.com/v2.1/get-time-zone?key=62ZRS9TDJL0R&format=xml&by=position&lat=40.689247&lng=-74.044502",
        type: "GET",
        success: function(result){
            console.log(result);
        }
    })
})
