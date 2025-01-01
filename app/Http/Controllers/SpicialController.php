<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Spicialization;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SpicialController extends Controller
{

        public function addspicial(){

                $center = Center::all();
                $center = Center::get('centername');
                $users= User::where('role', 0)
                        ->latest()->take(5)
                        ->get();
                $usersnum = DB::table('users')
                        ->where('role', 0)
                        ->count('id');
                $allusers = User::where('role', 0)
                        ->orderBy('id', 'DESC')
                        ->get();
                $centerssnum = DB::table('centers')
                        ->count('id');
                $visitor = Visitor::first()->count;

                return view('admin.addspicial',compact('center','users','usersnum','allusers','centerssnum','visitor'));

        }

        public function getspecial($id)
        {
                $center = Center::all();
                $spec = Spicialization::all();
                $about = Center::with('spicializations')->where('id',$id)->get();

                return view('specialization',compact('center','about'));
        }

        public function Show($id)
        {
                $center = Center::all();
                $spec = Spicialization::all();
                $spicials = Spicialization::all();
                $about = Center::with('spicializations')->where('id',$id)->get();

                return view('special',compact('center','about','spicials'));
        }

        public function store(Request $request)
        {
                $validatedData = $request->validate([
                        'specname' => 'required',
                        'description' => 'required',
                        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                ]);

                $spicial = new Spicialization();
                $spicial->specname = $validatedData['specname'];
                $spicial->description = $validatedData['description'];
                if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $imageName = time() . '_' . $image->getClientOriginalName();
                        $image->storeAs('images',$imageName, 'public');
                        $spicial->image = $imageName;
                }
                
                $spicial->save();

                return redirect()->back()->with('success', 'Center added successfully.');
        }
}