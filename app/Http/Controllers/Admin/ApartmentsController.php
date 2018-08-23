<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Gallery;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $apartments = Apartment::with('gallery')
        ->paginate(10);

        return view('admin.apartments.index')->with('apartments',$apartments);
    }

    public function edit($id)
    {
        $apartment=Apartment::with('gallery')
            ->where('id',$id)
            ->get();

        return view('admin.apartments.edit')->with('apartments',$apartment);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'name'=>'required',
            'text'=>'required',
            'price'=>'required|integer',
            'gallery_id'=>'required'
        ]);


       if($gallery = Gallery::find($request->input('gallery_id')) !== null){

           $apartment = Apartment::find($id);
           $apartment->name = $request->input('name');
           $apartment->text = $request->input('text');
           $apartment->price = $request->input('price');
           $apartment->gallery_id = $request->input('gallery_id');
           $apartment->save();

           return redirect(route('admin.apartments'));
       } else{


          // return redirect(route('admin.apartments.edit'));
           return redirect(route('admin.apartments'))
               ->with('errorMessageDuration', 'Error: Image with this id does not exist. The image of the apartment has not been changed. Make a edit again!');
       }





    }
}
