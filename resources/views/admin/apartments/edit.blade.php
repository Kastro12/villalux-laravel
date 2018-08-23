@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin.apartments')}}">
                <button class="btn btn-dark" style="margin-right: 20px"><b>Apartments</b></button>
            </a>
        </li>
    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12"><br/>


@foreach($apartments as $apartment)

    <!-- Forma za ubacivanje slike -->
        {!! Form::open(['action'=>['Admin\ApartmentsController@update',$apartment->id],'method'=>'POST',
        'enctype'=>'multipart/form-data']) !!}

        {{Form::label('name','Apartment name')}}
        {{Form::text('name',$apartment->name,['class'=>'form-control'])}}
        <br/>
        {{Form::label('text','Text')}}
        {{Form::text('text',$apartment->text,['class' => 'form-control'])}}
        <br/>
        {{Form::label('price','Price')}}
        {{Form::number('price',$apartment->price,['class'=>'form-control'])}}
        <br/>
        {{Form::label('gallery_id','Image id')}}
        {{Form::number('gallery_id',$apartment->gallery_id)}}
        <br/>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update',['class' => 'btn btn-primary'])}}

        {!! Form::close() !!}


@endforeach
            </div>
        </div>
    </div>

@endsection