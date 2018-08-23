<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Reserve;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $apartments = Cache::remember('apartments',15,function (){
           return Apartment::with('gallery')->get();
        });

        return view('reserve.index')->with('apartments',$apartments);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->getContent();
        $d = json_decode($data,true);
        $user_id = auth()->user()->id;


        //PROVERAVA BROJ REZERVACIJA

        $count = Reserve::where('user_id', $user_id)->count();
        if($count > 2)
        {
            return response()->json($count);
        }


    // UPOREDJIVANJE DATUMA IZ BAZE I UNOSA

                //pravljenje niza unesenih datuma
                $arr = [];
                $d1 = new \DateTime($d[0]['arrival']);
                $d2 = new \DateTime($d[0]['departure']);
                $interval = \DateInterval::createFromDateString('1 day');
                $period = new \DatePeriod($d1, $interval, $d2);



                foreach ($period as $oneDay)
                {
                    array_push($arr,$oneDay->format('d-m-Y'));
                }
                //datumi iz baze

                $reservations = Reserve::with('apartment')->get();
                $bArr=[];
                foreach ($reservations as $reservation)
                {
                    $fd = new \DateTime($reservation['arrival']);
                    $sd = new \DateTime($reservation['departure']);

                    $bInterval = \DateInterval::createFromDateString('1 day');
                    $bPeriod = new \DatePeriod($fd, $bInterval, $sd);

                    foreach($bPeriod as $p)
                    {
                        array_push($bArr,$p->format('Y-m-d'));
                    }
                }


                //uporedjivanje

                    $comparison = array_intersect($arr, $bArr);
                        if(!empty($comparison))
                        {
                            return response()->json($comparison);
                        }

        //   KREIRANJE REZERVACIJE

                $reserve = new Reserve();
                  foreach($d as $dataStore)
                  {
                      $reserve->arrival = $dataStore['arrival'];
                      $reserve->departure = $dataStore['departure'];
                      $reserve->reservation_price = $dataStore['reservation_price'];
                      $reserve->reservation_day = $dataStore['reservation_day'];
                      $reserve->status = 0;
                      $reserve->user_id = $user_id;
                      $reserve->apartment_id = $dataStore['apartment_id'];
                  }
                  $reserve->save();

            return new Response('success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve = Reserve::find($id);
        $reserve->delete();

        return redirect(route('profile'));
    }

    public function showDays(Request $request)
    {

        $data = $request->getContent();
        $apId = json_decode($data,true);

        $dates = Reserve::where('apartment_id',$apId)
                ->where('status',1)
                ->get();

        $datesArray = [];
        $datePeriod = '';
        foreach($dates as $date)
        {
            $arrival =  new \DateTime($date['arrival']);
            $departure = new \DateTime($date['departure']);

            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($arrival,$interval,$departure);



            foreach ($period as $datePeriod)
            {
               array_push($datesArray,$datePeriod->format('Y-m-d'));
            }

        }

        return response()->json($datesArray);
    }


    public function showPrice(Request $request)
    {
            $data = $request->getContent();
            $apId = json_decode($data,true);


            $apartment = Apartment::where('id',$apId)
                        ->get();



            foreach($apartment as $price)
            {
                    $p = $price['price'];

            }

            return response()->json($p);

    }
}
