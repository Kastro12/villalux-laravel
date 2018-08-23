<?php

namespace App\Http\Controllers\Admin;

use App\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $currentY = date('Y');


$reserves = DB::select('select * from reserves where YEAR(reservation_day)='.$currentY);

        return view('admin.payments.index')->with('reserves',$reserves);
    }

    public function pastY()
    {
        $currentY = date('Y');
        $pastY = $currentY - 1;
        $reserves = DB::select('select * from reserves where YEAR(reservation_day)='.$pastY);

        return view('admin.payments.past')->with('reserves',$reserves);
    }

}
