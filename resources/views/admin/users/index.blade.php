@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">
        <li>
        <a href="{{route('admin.users')}}">
        <button class="btn btn-success" style="margin-right: 20px"><b>All Users</b></button>
        </a>
        </li>
        <li>
        <a href="{{route('admin.usersWithRes')}}">
        <button class="btn btn-primary" style="margin-right: 20px">Users with reservations</button>
        </a>
        </li>
        <li>
        <a href="{{route('admin.usersWithoutRes')}}">
        <button class="btn btn-primary" style="margin-right: 20px">Users without reservations</button>
        </a>
        </li>

    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12"><br/>

                <!-- ovde idu tabele -->

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created at</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                    @endforeach

                </table>


            </div>
        </div>
    </div>
    {{ $users->links() }}
@endsection