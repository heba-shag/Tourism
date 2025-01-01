<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spicialization;
use App\Models\Center;
use App\Models\Consultation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
    // public function index()
    // {
    //     $spicials = Spicialization::all();
    //     $centers = Center::all();
    //     $ratecenter = Center::get('star');
    //     $users = User::all();
    //     // $about = Consultation::with('spicializations')->where('spicialization_id',$spicials->id);
    //     $mostCommonMessages = Consultation::getMostCommon();

    //     return view('welc',compact('spicials','centers','ratecenter','users','mostCommonMessages'));
    // }


    public function store0(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'spicialization_id' => 'required',
            'massege' => 'required',
        ]);

        Consultation::create([
            'user_id' => $request->user_id,
            'spicialization_id' => $request->spicialization_id,
            'massege' => $request->massege,
        ]);
        $spicials = Spicialization::all();
        $mostCommonMessage = Consultation::getMostCommon($spicials->id);
        if($mostCommonMessage)
        {
            $masseges = $mostCommonMessage->massege;
            $massegeCount = $mostCommonMessage->total;
        }
        // $this->getMostCommon($masseges);
        return redirect()->back()->with('sucsess');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'spicialization_id' => 'required',
            'massege' => 'required',
            'country_code' => 'required',
            'phone_number' => 'required',
        ]);
        $fullPhoneNumber = $request->input('country_code') . $request->input('phone_number');

        Consultation::create([
            'user_id' => $request->user_id,
            'spicialization_id' => $request->spicialization_id,
            'massege' => $request->massege,
            'country_code' => $request->country_code,
            'phone_number' => $fullPhoneNumber,
        ]);
    
        // Assuming there's more code here, like fetching $spicials and $mostCommonMessage
    
        $spicials = Spicialization::all();
        $mostCommonMessage = Consultation::getMostCommon($request->spicialization_id);
        // if($mostCommonMessage)
        // {
        //     $masseges = $mostCommonMessage->massege;
        //     $massegeCount = $mostCommonMessage->total;
        // }
        // $this->getMostCommon($masseges);
        return redirect()->back()->with('sucsess');
    }



}
