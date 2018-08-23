@extends('layouts.adminApp')
@section('content')
    <ol class="breadcrumb">
    <li>
        <a href="{{route('admin.payments')}}">
            <button class="btn btn-light" style="margin-right: 20px"><b>Payments for this year</b></button>
        </a>
    </li>
    <li>
        <a href="{{route('admin.payments.past')}}">
            <button class="btn btn-dark" style="margin-right: 20px"><b>Payments for the past year</b></button>
        </a>
    </li>
    </ol>

    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12">
            <br/><br/>
                <?php
                    $debt=0;
                    $paid=0;
                    $expected=0;
                ?>
                @foreach($reserves as $reserve)
                    @if($reserve->status !== 0)
                    <?php
                    $debt += ($reserve->reservation_price - $reserve->paid);
                    $paid += $reserve->paid;
                    $expected += $reserve->reservation_price;
                    ?>
                    @endif
                 @endforeach
            <div class="row">
                <b>Total debt of confirmed reservations</b> &nbsp; {{$debt.'€'}}
                </div><br/><br/>
                <div class="row">
                <b>Total paid up to now</b> &nbsp; &nbsp;{{$paid.'€'}}
                </div><br/><br/>
                <div class="row">
                <b>Expected total payment</b> &nbsp; &nbsp;{{$expected.'€'}}
                </div><br/><br/>
            </div>

            </div>
        </div>
    </div>


@endsection