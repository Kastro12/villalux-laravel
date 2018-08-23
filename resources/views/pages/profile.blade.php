@extends('layouts.app')

@section('content')

    @include('inc.headerS')
    @guest
        <b>tekst</b>
    @else
<br/><br/><br/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                <div class="profile">
                   <table>
                       <h4><b>Your info:</b></h4>
                       <tr><th>Name:</th></tr>
                       <tr><td>{{Auth::user()->name}}</td></tr>
                       <tr><th>Email:</th></tr>
                       <tr><td>{{Auth::user()->email}}</td></tr>
                       <tr><th>Phone:</th></tr>
                       <tr><td>{{Auth::user()->phone}}</td></tr>
                   </table>
                    <b style="color: red;font-size: 20pt">*</b>
                    Please pay a deposit(30% of full price) which confirms the reservation.Invoice has been sent to your email.

                </div>

            </div>
                <div class="col-sm-9">
                <div class="profile">
                <h4><b>Your reservation:</b></h4><br/>

                <div class="row">

                @foreach($reserves as $reserve)
                    <div class="col-sm-4" style="border-right: 1px solid #b3b3b3">
                    <table>
                    <tr><th>Date of reservation:</th>
                    <td>{{$reserve->reservation_day}}</td></tr>
                    <tr><th>Apartment:</th>
                    <td>{{$reserve->apartment->name}}</td></tr>
                    <tr><th>Arrival:</th>
                    <td>{{$reserve->arrival}}</td></tr>
                    <tr><th>Departure:</th>
                    <td>{{$reserve->departure}}</td></tr>
                    <tr><th>price:</th>
                    <td>{{$reserve->reservation_price}} €</td></tr>
                    <tr><th>Confirmed?:</th>
                    @if($reserve->status === 0)

            <!-- FORM FOR DELETE -->
            {!! Form::open(['action'=> ['ReserveController@destroy',$reserve->id],
            'method'=>'POST','enctype'=>'multipart\form_data']) !!}
                <td style="color: red"><b>No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('delete',['class'=>'btn btn-danger'])}}
                </td>
            {!! Form::close() !!}




                    @else
                    <td style="color: green"><b>Yes</b></td>
                    @endif
                    </tr>
                    </table><hr>
                    </div>
                @endforeach
                </div>
                </div>
                </div>
            </div>
        </div>
<br/><br/><br/>
    @endguest

@include('inc.footer')




@endsection