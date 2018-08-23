<?php

namespace App\Http\Controllers\Admin;

use App\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $reserves = Reserve::with(['apartment','user'])
            ->orderBy('reservation_day','desc')
            ->paginate(10);

        return view('admin.reservations.index')->with('reserves',$reserves);
    }

    public function unconfirmed()
    {

        $reserves = Reserve::with(['apartment','user'])
            ->where('status',0)
            ->orderBy('reservation_day','desc')
            ->paginate(10);

        return view('admin.reservations.unconfirmed')->with('reserves',$reserves);
    }

    public function confirmed()
    {
        $reserves = Reserve::with(['apartment','user'])
            ->where('status',1)
            ->orderBy('reservation_day','desc')
            ->paginate(10);

        return view('admin.reservations.confirmed')->with('reserves',$reserves);
    }

    public function destroy($id)
    {

        $reserve = Reserve::find($id);
        $reserve->delete();

        return redirect(route('admin.reservations'));

    }

    public function edit($id)
    {

        $reserve = Reserve::with(['apartment','user'])
            ->where('id',$id)
            ->get();


        return view('admin.reservations.edit')->with('reserves', $reserve);
    }

    public function update(Request $request, $id)
    {

    $reserve = Reserve::find($id);
    $payment = $reserve->paid + $request->paid;
    $reserve->paid = $payment;
    $reserve->status=1;
    $reserve->save();

    return redirect(route('admin.reservations.confirmed'));
    }

    public function paidRes()
    {
        $reserve = Reserve::with(['apartment','user'])
            ->where('status',1)
            ->orderBy('reservation_day','desc')
            ->paginate(10);

        return view('admin.reservations.paid')->with('reserves',$reserve);
    }

}
