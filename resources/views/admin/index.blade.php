@extends('layouts.adminApp')
@section('content')
    <!-- title -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <b>Admin</b>
        </li>
    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12">
<br/><br/><br/><br/><br/><br/>
  <center><b style="font-size: 25pt">Welcome {{Auth::user()->name}}</b></center>



            </div>
        </div>
    </div>


@endsection