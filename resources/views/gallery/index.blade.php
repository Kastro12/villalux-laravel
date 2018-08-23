@extends('layouts.app')
@section('content')
    <div class="header">

    @include('inc.headerS')


    </div><br/><br/><br/>

<div class="container">

    <center>
    <button class="send btn btn-lg"><a href="{{asset('gallery')}}">All</a></button>
    <button class="send btn btn-lg" onclick="window.location.href='http://localhost/vl/public/gallery/villa'">Villa Lux</button>
    <button class="send btn btn-lg" onclick="window.location.href='http://localhost/vl/public/gallery/apartment'">Apartments</button>
    <button class="send btn btn-lg" onclick="window.location.href='http://localhost/vl/public/gallery/trsteno'">Trsteno beach</button>
    <button class="send btn btn-lg" onclick="window.location.href='http://localhost/vl/public/gallery/ploce'">Ploce beach</button>
    <button class="send btn btn-lg" onclick="window.location.href='http://localhost/vl/public/gallery/jaz'">Jaz beach</button>
    </center>
    <br/><br/>


    @if(count($images)>0)
<div class="container">
            <div class="row">
                @foreach($images as $image)
                    <div class="col-sm-3">
                    <a href="/vl/public/storage/images/{{$image->image}}" data-fancybox="group">
                    <div class="show_img">
                        <div class="fancybox">
                        <img src="/vl/public/storage/images/{{$image->image}}" class="img-responsive"/>
                        </div>
                    </div>
                    </a>
                    </div>
                @endforeach
            </div>
    @endif


</div></div>

@include('inc.footer')

@endsection