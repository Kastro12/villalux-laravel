@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin.reservations')}}">
                <button class="btn btn-primary" style="margin-right: 20px"><b>All Reservations</b></button>
            </a>
        </li>
        <li>
            <a href="{{route('admin.reservations.unconfirmed')}}">
                <button class="btn btn-primary" style="margin-right: 20px">Unconfirmed reservations</button>
            </a>
        </li>
        <li>
            <a href="{{route('admin.reservations.confirmed')}}">
                <button class="btn btn-primary" style="margin-right: 20px">Confirmed reservations</button>
            </a>
        </li>
        <li>
            <a href="{{route('admin.reservations.paid')}}">
                <button class="btn btn-success" style="margin-right: 20px">Paid reservations</button>
            </a>
        </li>

    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12"><br/>

                <!-- ovde idu tabele -->

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Reservation Day</th>
                        <th>Apartment</th>
                        <th>Email</th>
                        <th>Arrival</th>
                        <th>Departure</th>
                        <th>Price</th>
                        <th>Paid</th>

                        <th>Delete</th>
                    </tr>
                    @foreach($reserves as $reserve)
                        @if($reserve->reservation_price <= $reserve->paid)
                            <tr>
                                <td>{{$reserve->reservation_day}}</td>
                                <td>{{$reserve->apartment->name}}</td>
                                <td>{{$reserve->user->email}}</td>
                                <td>{{$reserve->arrival}}</td>
                                <td>{{$reserve->departure}}</td>
                                <td>{{$reserve->reservation_price}}€</td>
                                <td>{{$reserve->paid}}€</td>


    <!-- FORM FOR DELETE -->
    {!! Form::open(['action'=> ['Admin\ReserveController@destroy',$reserve->id],
    'method'=>'POST','enctype'=>'multipart\form_data']) !!}
    <td>
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('✘',['class'=>'btn btn-danger'])}}
    </td>
    {!! Form::close() !!}
                            </tr>
                        @endif
                    @endforeach
                </table>


            </div>
        </div>
    </div>
    {{$reserves->links()}}
@endsection