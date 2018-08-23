$(document).ready(function () {
   $(document).on('click','#reserve', function (e) {
      e.preventDefault();

      var apartment = document.querySelector('#choose_ap').value;
      var arrival = document.querySelector('#arrival').value;
      var departure = document.querySelector('#departure').value;
      var price = document.querySelector('#price').value;



      var reservationArr =[];

      var d1 = new Date(arrival);
      var d11 = d1.getTime();
      var d2 = new Date(departure);
      var d22 = d2.getTime();
      var dayNum = Math.round((d22-d11)/(60*60*24)/1000);
      var fullPrice = dayNum * price;

        if(apartment === undefined || apartment === '...')
        {
            alert('Incorrectly entered reservation.');
            return false;
        }

        if(arrival ==='' || departure === '')
        {
            alert('Incorrectly entered reservation.');
            return false;
        }


      if(d11 >= d22){
          alert('Dates are not well entered!');
          return false;
      }

      if(confirm('Confirm your reservation.'))
      {
          var date = new Date();
          var b_year = date.getFullYear();
          var b_Month = ("0" + (date.getMonth() + 1)).slice(-2); // +1 to zero based month
          var b_date = ("0" + date.getDate()).slice(-2);
          var currentDay = (b_year + '-' + b_Month + '-' + b_date);

          reservationArr.push({
            apartment_id:apartment,
            arrival:arrival,
            departure:departure,
            reservation_price:fullPrice,
            reservation_day:currentDay,
          });

          var jsonArr = JSON.stringify(reservationArr);

            $.ajax({
               url:'http://localhost/vl/public/reserve',
               method:'POST',
               contentType: 'application/json',
               data: jsonArr,
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               success:function (data) {
                checkingData(data);
               },
               error: function (data) {

               }


            });
      }
   });
});


function checkingData(d)
{

    if(d>2)
    {
        alert('Whoops!!! At one point you can have a maximum of 3 reservations');
    }

    if(typeof d==='object')
    {
        var text = "";
        var x;

        for(x in d)
        {
            text += d[x] + ' ';
        }
        alert('Whoops!!! In the period of your reservation('+text+'), the apartment is ' +
            'already reserved. See other apartments whether they are free during this' +
            ' period or choose the second day of your stay.');
    }
    else
    {
        window.location.replace('http://localhost/vl/public/profile');
    }
}