@extends('layouts.app')
@section('content')
@include('inc.headerS')
<br/><br/>

@auth
    <div class="container">
        <div class="reservation_form">
            <form>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Choose Apartment</label><br/>
                        <select class="form-control" id="choose_ap">
                            <option>...</option>
                            @foreach($apartments as $apartment)
                            <option value="{{$apartment->id}}">{{$apartment->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Arrival</label><br/>
                        <input type="text" class="form-control" id="arrival" readonly/>
                    </div>
                    <div class="col-sm-3">
                        <label>Departure</label><br/>
                        <input type="text" class="form-control" id="departure" readonly/>
                    </div>
                    <div class="col-sm-1">
                        <label style="font-size: 10pt">€ per day</label><br/>
                        <input type="text" style="font-size: 20pt" class="form-control" id="price" value="" readonly />
                    </div>
                    <div class="col-sm-2"><br/>
                        <button class=" btn btn-primary btn-lg" type="button" id="reserve">Book it</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endauth
@guest
    <div class="container">
        <center><div class="alert alert-dark"><b>Log in to book an apartment</b></div></center>
    </div>
@endguest




<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div class="container">
    <div class="row">
            @foreach($apartments as $apartment)
                <div class="col-sm-4">
                    <div class="hovereffect">
                    <img src="/vl/public/storage/images/{{$apartment->gallery->image}}" class="img-responsive">
                    <div class="overlay">
                    <b><h4 style="float: left">{{$apartment->name}}</h4></b>
                    <a class="info">{{$apartment->text}}</a>
                    </div>
                    </div>
                </div>
            @endforeach
    </div>
</div><br/>
@include('inc.footer')
@endsection()