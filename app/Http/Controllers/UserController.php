<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Center;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users=User::all();
        // $usersnum = DB::table("users")->count('id');
        // $usersnum = User::role('0')->count('id')->get();
        $usersnum =User::where('role', 0)
                ->count('id');
        $centerssnum = Center::count('id');
        $users = User::where('role', 0)
                ->latest()
                ->take(5)
                ->get();
        $allusers = User::where('role', 0)
        ->orderBy('id', 'DESC')
            ->get();
        $centers = Center::all();
        $visitor = Visitor::first()->count;
        return view('admin.welcome',compact('users','usersnum','allusers','centerssnum','centers','visitor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        return view('manager.welcome');

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
