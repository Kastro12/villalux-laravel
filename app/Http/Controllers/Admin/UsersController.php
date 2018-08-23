<?php

namespace App\Http\Controllers\Admin;

use App\Reserve;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $users = User::paginate(10);

            return view('admin.users.index')->with('users',$users);
    }

    public function usersWithoutRes()
    {

        $users = User::all();
        $usersRes = Reserve::all();

        $userResId=[];
        $userId=[];

        foreach($usersRes as $userRes)
        {

            array_push($userResId,$userRes->user_id);
        }

        foreach($users as $user)
        {
            array_push($userId,$user->id);
        }



        $result = array_diff($userId,$userResId);

        $usersWithoutRes = User::whereIn('id',$result)
            ->orderBy('created_at','desc')
            ->paginate(10);



        return view('admin.users.usersWithoutRes')->with('users',$usersWithoutRes);
    }

    public function usersWithRes()
    {

        $users = User::all();
        $usersRes = Reserve::all();

        $userResId=[];
        $userId=[];

        foreach($usersRes as $userRes)
        {

            array_push($userResId,$userRes->user_id);
        }

        foreach($users as $user)
        {
            array_push($userId,$user->id);
        }

        $r = array_intersect($userResId,$userId);
        $result = array_unique($r);


        $usersWithRes = User::whereIn('id',$result)
            ->orderBy('created_at','desc')
            ->paginate(10);

        return view('admin.users.usersWithRes')->with('users',$usersWithRes);
    }

    public function destroy($id)
    {
            $user = User::find($id);
            $user->delete();

        return redirect(route('admin.usersWithoutRes'));

    }



}