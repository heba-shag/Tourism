<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\RateCenter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RatecenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $center = Center::all();
        
        return view('center',compact('center'));
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
    public function store(Request $request, Center $center)
{
    
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'center_id' => 'required|exists:centers,id',
        'star_rating' => 'required|integer|min:1|max:5',
    ]);

    Ratecenter::updateOrCreate(
        ['user_id' => $validatedData['user_id'], 'center_id' => $center->id],
        ['star_rating' => $validatedData['star_rating']]
    );
    $center_id = $center->id;
    $this->calculateRating($center_id);
    return redirect()->back()
        ->with('success', 'Rate created or updated successfully.');
}

public function calculateRating($id)
{
    $center = Center::find($id);
    $rating = DB::select("select SUM(star_rating)/COUNT('user_id') as star
            FROM rate_centers where center_id = ?" , [$id]);
    $center->star = doubleval($rating[0]->star);
    $center->save();
}

    public function store1(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'center_id' => 'required|exists:centers,id',
            'star_rating' => 'required|integer|min:1|max:5',
        ]);
    
        $rate = Ratecenter::updateOrCreate(
            ['user_id' => $validatedData['user_id'], 'center_id' => $validatedData['center_id']],
            ['star_rating' => $validatedData['star_rating']]
        );
    
        return redirect()->route('ratecenter.index')
            ->with('success', 'Rate created or updated successfully.');
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
