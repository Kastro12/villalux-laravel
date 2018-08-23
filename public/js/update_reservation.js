$(document).ready(function () {

  var d =  $('#choose_ap');
    $(d).change(reservationInfo);

});

function reservationInfo () {

    var selectAp = $('#choose_ap option:selected').val();



    calendar();
    price();
}



function calendar()
{
    var selectAp = $('#choose_ap option:selected').val();

    if(selectAp === undefined || selectAp === '...')
    {
        alert('popuni polja');
        return false;
    }

  var jsonAp = JSON.stringify(selectAp);
console.log(jsonAp);
            $.ajax({
                url:'http://localhost/vl/public/reserve/showDays',
                method:'POST',
                data:jsonAp,
                    //_token: $('meta[name="csrf-token"]').attr('content')
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                initComponent(data);
                },
                error: function (data) {
                    console.log('error');
                }
            });
}

function initComponent(availableDates)
{
        if(availableDates === null)
        {
            return true;
        }

        var today = new Date();

    $("#arrival, #departure").datepicker("setDate",null);

    $("#arrival ,#departure").datepicker("destroy");
    $("#arrival, #departure").datepicker({
        minDate:today,
        dateFormat: 'yy-mm-dd',
        beforeShowDay: function(date)
        {

            var b_year =date.getFullYear();
            var b_Month =("0" + (date.getMonth() + 1)).slice(-2); // +1 to zero based month
            var b_date =("0" + date.getDate()).slice(-2);

            var dmy = (b_year +"-"+b_Month+"-"+ b_date );



            if ($.inArray(dmy, availableDates) < 0) {

                return [true, "", "Book Now"];
            } else {

                return [false, "", "Booked Out"];

            }


        }


    });

}


function price()
{

    var selectedAp = $('#choose_ap option:selected').val();

    if(selectedAp === undefined || selectedAp ==='...')
    {
        return false;
    }

    var jsonAp = JSON.stringify(selectedAp);

    $.ajax({
        url:'http://localhost/vl/public/reserve/showPrice',
        method:'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:jsonAp,
        success: function (data) {
            $('#price').val(data);
        },
        error:function () {

        }
    })

}