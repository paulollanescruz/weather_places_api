$(function(){

    $("#destination").change(function(){
        var loc = $(this).val();

        if(loc != "")
        {
            $.ajax({
                url: 'search/get_places' ,
                type: 'get',
                dataType: 'json',
                data: {loc: loc},
                success: function(data)
                {
                    if(data.is_valid)
                    {
                        $(".weather").html(data.weather);
                        $(".places").html(data.places);
                    }
                }
            });
        }
        else
        {
            console.log("No destination selected.");
        }
    });

});