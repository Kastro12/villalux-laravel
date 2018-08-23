@extends('layouts.adminApp')
@section('content')

    <!-- title -->

    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12"><br/>
<center>
            <table class="table table-bordered table-hover">
               @foreach($reserves as $reserve)



                    <tr><th>Reservation Day</th><td>{{$reserve->reservation_day}}</td></tr>
                     <tr><th>Apartment</th><td>{{$reserve->apartment->name}}</td></tr>
                     <tr><th>Email</th><td>{{$reserve->user->email}}</td></tr>
                     <tr><th>Arrival</th><td>{{$reserve->arrival}}</td></tr>
                     <tr><th>Departure</th><td>{{$reserve->departure}}</td></tr>
                     <tr><th>Full price</th><td>{{$reserve->reservation_price}}€</td></tr>
                     <tr><th>Paid</th><td>{{$reserve->paid}}€</td></tr>
                     <tr><th>Dept</th><td>{{$reserve->reservation_price - $reserve->paid}}€</td></tr>

         <!-- FORM FOR UPDATE -->
           {!! Form::open(['action' => ['Admin\ReserveController@update',$reserve->id],
           'method'=>'POST', 'enctype'=>'multipart\form_data']) !!}
            <tr><th style="color: green">New payment</th>
            <td>
               {{Form::number('paid',0,['class' => 'form-control'])}}
            </td></tr>
            <tr><th></th>
            <td>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
            </td>
            </tr>
        {!! Form::close() !!}
               @endforeach
            </table>
</center>




            </div>
        </div>
    </div>

@endsection