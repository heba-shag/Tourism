<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\RateCenter;
use App\Models\Spicialization;
use App\Models\User;
use App\Models\Consultation;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $centers = Center::all();
        $ratecenter = Center::get('star');
        $users = User::all();
        $spicials = Spicialization::all();
        // $about = Consultation::with('spicializations')->where('spicialization_id',$spicials->id);
        $mostCommonMessages = Consultation::getMostCommon();
        $visitor = Visitor::first();
            $count = $visitor->count;
            $visitor->update(['count' => $count + 1]);

        return view('welcome',compact('centers','ratecenter','users','spicials','mostCommonMessages'));
    }

    public function adminHome()
    {
        return view('admin/welcome');
    }
    
    public function store(Request $request)
    {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
    
        $data = [
            'centername' => $request->input('centername'),
            'description' => $request->input('description'),
            // 'email' => $request->input('email'),
            // 'site' => $request->input('site'),
            'image' => $imagePath,
        ];
    
        Center::create($data);
    
        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function stodre(Request $request)
    {
        $imageName = time() . '_' . md5(Str::random(2)) . '_' . uniqid() . '.' . $request->image->extension();
        $imagePath = public_path('/images');
        $request->image->move($imagePath, $imageName);
        $c = Center::create([
            'centername' => $request->centername,
           'description' =>  $request->descriptions,
           'email' => 'u@hh.com',
            'site' => 'baghdad',
            'image' => "/images/$imageName"
        ]);

        // $c = new Center;
        // // $c = Center::where('id',1);
        // $c->centername = 'new';
        // $c->description = 'neeeew';
        // $c->phone = '0975432';
        // $c->email = 'u@hh.com';
        // $c->site = 'baghdad';
        // $file_path = $request->file('image')->store('public/images');
        // $c->image = str_replace('public/', '', $file_path);
    
        // $c->save();
    
        return redirect()->back()->with('success', 'User created successfully!');
    }
   

}