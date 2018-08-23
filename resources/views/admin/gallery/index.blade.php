@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">
        <li>
            <a href="{{route('admin.gallery')}}">
                <button class="btn btn-dark" style="margin-right: 20px"><b>Gallery</b></button>
            </a>
        </li>
        <li>
            <a href="{{route('admin.gallery.create')}}">
                <button class="btn btn-primary" style="margin-right: 20px">New image</button>
            </a>
        </li>


    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12"><br/>

                <!-- ovde idu tabele -->

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Image</th>
                        <th>Image id</th>
                        <th>Name</th>
                        <th>category</th>
                        <th>Text</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td class="slika">

                            <img src="/vl/public/storage/images/{{$gallery->image}}" class="img-responsive">

                            </td>
                            <td style="float: right">{{$gallery->id}}</td>
                            <td>{{$gallery->image}}</td>
                            <td>{{$gallery->category}}</td>
                            <td>{{$gallery->text}}</td>
                            <td>
    <!-- FORM FOR DELETE -->
    {!! Form::open(['action'=>['Admin\GalleryController@destroy',$gallery->id],
    'method'=>'POST','enctype'=>'multipart\form_data']) !!}

    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('✘',['class'=>'btn btn-danger'])}}

    {!! Form::close() !!}
                            </td>

                        </tr>
                        @endforeach

                </table>


            </div>
        </div>
    </div>
    {{ $galleries->links() }}
@endsection

<script>

    function f(a) {
     //   var del = document.getElementById('deleteImg');

        alert(a);
    }
;

</script>