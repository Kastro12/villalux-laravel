<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $gallery = Gallery::paginate(10);


        return view('admin.gallery.index')->with('galleries',$gallery);
    }

    public function destroy($id)
    {
        $img = Gallery::find($id);

        if($img->image)
        {
           Storage::delete($img->image);
        }

        $img->delete();

        return redirect(route('admin.gallery'));
    }

    public function create(Request $request)
    {


    $this->validate($request,[
        'category'=>'required',
        'text'=>'required',
        'image'=>'max:1999'
    ]);


    //  dd($request->file('image'));die;

            //Get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $request->category.'/'.$filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs("/",$fileNameToStore);



        $gallery = new Gallery();
        $gallery->category = $request->input('category');
        $gallery->text = $request->input('text');
        $gallery->image = $fileNameToStore;
        $gallery->save();

        return redirect('admin/gallery')->with('success','Post created');
    }



    public function newGallery()
    {
      return view('admin.gallery.create');
    }
}
