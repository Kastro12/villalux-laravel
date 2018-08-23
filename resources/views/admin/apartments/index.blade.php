@extends('layouts.adminApp')
@section('content')

    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin.apartments')}}">
                <button class="btn btn-dark" style="margin-right: 20px"><b>Apartments</b></button>
            </a>
        </li>
    </ol>


    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12">

                <!-- ovde idu tabele -->

                @if(!empty(session('errorMessageDuration')))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('errorMessageDuration') }}

                    </div>
                @endif


                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Text</th>
                        <th>Image</th>

                    </tr>
                @foreach($apartments as $apartment)
                <tr>
                <td>{{$apartment->name}}</td>
                <td>{{$apartment->price}}</td>
                <td style="width: 500px">{{$apartment->text}}</td>
                <td>
                <div class="slikaApartmana">
                <img src="/vl/public/storage/images/{{$apartment->gallery->image}}" class="img-responsive">
                <br/>
                <p>{{$apartment->gallery->image}}</p>
                </div>
                </td>
                <td style="float: right"><button onclick='window.location.href="/vl/public/admin/apartments/{{$apartment->id}}/edit/"' class="btn btn-dark">Edit</button></td>
                </tr>

                @endforeach
                </table>


            </div>
        </div>
    </div>

{{$apartments->links()}}
@endsection