@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin.gallery')}}">
                <button class="btn btn-dark" style="margin-right: 20px"><b>Gallery</b></button>
            </a>
        </li>
    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12"><br/>

                <!-- Forma za ubacivanje slike -->
    {!! Form::open(['action'=>'Admin\GalleryController@create','method'=>'POST',
    'enctype'=>'multipart/form-data']) !!}

    {{Form::label('category','Category')}}
    {{Form::select('category',
    ['apartment'=>'apartment','villa'=>'villa','jaz'=>'jaz','trsteno'=>'trsteno','ploce'=>'ploce'],'',
    ['id'=>'article-ckeditor','class' => 'form-control'])}}
<br/><br/>
    {{Form::label('text','Text')}}
    {{Form::text('text','',['class' => 'form-control'])}}
<br/><br/>
    {{Form::file('image')}}
<br/><br/>
    {{Form::submit('Insert',['class' => 'btn btn-primary'])}}

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection