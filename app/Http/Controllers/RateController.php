<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Center;
use App\Models\Spicialization;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Consultation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::all();
        $spicials = Spicialization::all();
        $ratecenter = Center::get('star');
        $users = User::all();
        $mostCommonMessages = Consultation::getMostCommon();
        
        return view('rate',compact('centers','spicials','ratecenter','users','mostCommonMessages'));
    
    }

    // public function index()
    // {
    //     $centers = Center::all();
    //     $spicials = Spicialization::all();
    //     // $mostCommonMessage = Consultation::getMostCommon();

    //     return view('rate',compact('centers','spicials'));
    
    // }
    public function agetrate()
    {
        $center = Center::all();
        $rates = Rate::all();
        $rate =  Rate::latest()->take(5)
        ->get();
        $users= User::where('role', 0)
                    ->latest()->take(5)
                    ->get();
        $allusers = User::where('role', 0)
                    ->orderBy('id', 'DESC')
                    ->get();
        $usersnum = DB::table('users')
                    ->where('role', 0)
                    ->count('id');
        $centerssnum = DB::table('centers')
                    ->count('id');
        $visitor = Visitor::first()->count;

        return view('admin.review',compact('rate','rates','users','usersnum','allusers','center','centerssnum','visitor'));
    }


    public function getrate()
    {
        $centers = Center::all();
        $rate = Rate::all();
        // $user = User::all(); 
        $spicials=Spicialization::all();
        $ratecenter = Center::get('star');
        $users = User::all();
        $mostCommonMessages = Consultation::getMostCommon();

        return view('review',compact('rate','users','centers','spicials','ratecenter','mostCommonMessages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if($request->rating != null && $request->message != null){
            $user_id = Auth::id();
            Rate::updateOrCreate(
                ['user_id' => $user_id],
                ['star_rating' => $request->rating , 'message' => $request->message]
            );
            return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
        }elseif($request->rating != null && $request->message == null){
            $user_id = Auth::id();
            Rate::updateOrCreate(
                ['user_id' => $user_id],
                ['star_rating' => $request->rating]
            );
            return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
        
        }elseif($request->rating == null && $request->message != null){
            $user_id = Auth::id();
            Rate::updateOrCreate(
                ['user_id' => $user_id],
                ['message' => $request->message]
            );
            return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
        
            
        }else{
            return redirect()->back()->withErrors(['error' => 'You Have To Make Rate For Us']);
        }

        // $exists = Rate::where('user_id', '=', Auth::user()->id)->exists();
        // if($request->rating != null && !$exists){
        //     $review = new Rate();
        //     $review->message= $request->message;
        //     $review->star_rating = $request->rating;
        //     $review->user_id = Auth::user()->id;
        //     $review->save();
        // }elseif($request->rating != null && $exists){

        //     $review->star_rating = update

        
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        //
    }
}
