<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Spicialization;
use App\Models\User;
use App\Models\Consultation;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $centerss = Center::all();
    //     $center = Center::all();
    //     $center = Center::get('centername');
    //     return view('aboutCenter',compact('center','centerss'));
    // }

    public function index2()
    {
        $centerss = Center::all();
        $center = Center::all();
        $center = Center::get('centername');
        return view('center',compact('center','centerss'));
    }


    public function addcenter()
    {
        $centers = Center::all();
        $center = Center::get('centername');
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
        $spicials=Spicialization::all();
        $data=Spicialization::all();

        $visitor = Visitor::first()->count;

        return view('admin.addcenter',compact('centers','center','users','allusers','usersnum','centerssnum','spicials','data','visitor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getspecial($id)
    {
        $center = Center::all();
        $spec = Spicialization::all();
        $about = Center::with('spicializations')->where('id',$id)->get();

        return view('specialization',compact('center','about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store0(Request $request)
    {
        $center = new Center;

        $center->centername = $request->input('centername');
        $center->email = $request->input('email');
        $center->phone = $request->input('phone');
        $center->site = $request->input('site');
        $center->description = $request->input('description');
        $valueToSave = '';
        if ($request->input('country') === '1') {
            $valueToSave = 'Turkey';
        } elseif ($request->input('country') === '2') {
            $valueToSave = 'Jordan';
        } else {
            $valueToSave = 'Syria';
        }
        $center->country = $request->input('valueToSave');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(Str::random(2)) . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/images', $image, $filename);
            $center->image = $filename;
        }
        $center->save();

        return redirect()->back()->with('success', 'Center added successfully!');
}

// public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'centername' => 'required',
//         'email' => 'required|email|unique:centers,email',
//         'phone' => 'required',
//         'site' => 'required',
//         'country' => 'required',
//         'description' => 'required',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         'spicializations' => 'required|array|min:1'
//     ]);

//     $center = new Center;
//     $center->centername = $validatedData['centername'];
//     $center->email = $validatedData['email'];
//     $center->phone = $validatedData['phone'];
//     $center->site = $validatedData['site'];
//     $center->country = $validatedData['country'];
//     $center->description = $validatedData['description'];

//     if ($request->hasFile('image')) {
//             $image = $request->file('image');
//             $filename = md5(Str::random(2)) . '.' . $image->getClientOriginalExtension();
//             Storage::putFileAs('public/images', $image, $filename);
//             $center->image = $filename;
//         }
//     $center->save();
//     $spicializations = array_map('intval', $validatedData['spicializations']);
//     // Attach spicializations to the center
//     // $center->spicializations()->attach($spicializations);
//     $center->spicializations()->attach($validatedData['spicializations']);

//     return redirect()->back()->with('success', 'Center added successfully.');
// }


public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'centername' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'site' => 'required|string',
        'country' => 'required|string',
        'spicializations' => 'required|array',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust allowed image types and max size as needed
    ]);

    // Store the center data
    $center = new Center();
    $center->centername = $validatedData['centername'];
    $center->email = $validatedData['email'];
    $center->phone = $validatedData['phone'];
    $center->site = $validatedData['site'];
    $center->country = $validatedData['country'];
    $center->description = $validatedData['description'];

    // $imagePath = $request->file('image')->store('images', 'public');
    // $center->image = $imagePath;
    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('images',$imageName, 'public');
        $center->image = $imageName;
    }

    $center->save();    
    $center->spicializations()->attach($validatedData['spicializations']);

    return redirect()->back()->with('success', 'Center added successfully.');

}

public function update(Request $request,$center)
{
    // Validation rules
    $validatedData = $request->validate([
        'centername' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'site' => 'required|string|max:255',
        'country' => 'required|string|in:syria,Turkey,Jordan,china,US',
        'spicializations' => 'required|array',
        'spicializations.*' => 'exists:spicializations,id', // Assuming 'spicializations' is your relation
        'description' => 'nullable|string|max:500',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example image validation
    ]);

    // Validation messages
    $center->centername = $validatedData['centername'];
    $center->email = $validatedData['email'];
    $center->phone = $validatedData['phone'];
    $center->site = $validatedData['site'];
    $center->country = $validatedData['country'];
    $center->description = $validatedData['description'];
        // ... Other fields ...

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        // Assuming you have a function to handle image uploads
        $imagePath = $this->uploadImage($request->file('image'));
        $center->image = $imagePath;
    }
    $center->save();

    // Sync specialization relationships
    $center->spicializations()->sync($request->spicializations);

    return redirect()->route('addcenter')->with('success', 'Center updated successfully');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show0($id)
    {
        // $center = Center::all();
        $centers = Center::all();
        $spicials = Spicialization::all();

        $center = Center::find($id);
        $spec = Spicialization::all();
        // $about = Center::with('spicializations')->where('id',$id)->find($id);
        $about = Center::with('spicializations')->where('id',$id)->get();
        
    // $center->load('spicializations');
    return view('center',compact('center','centers','about','spicials'));

        // dd($spec);
    }

public function show($id) {
    $centers = Center::all(); 
    $spicials = Spicialization::all(); 
    $center = Center::find($id);
    $about = Center::with('spicializations')->findOrFail($id);
    // $s = Center::with('spicializations')->get($id);
    if ($about) {
        $spicializationIds = explode(',', $about->spicialization_id);
    
        // Make sure there are more than one value separated by commas
        if (count($spicializationIds) === 1) {
            $thirdValue = $spicializationIds[0]; // Index 1 represents the second value
        }
        $mostCommonMessages = Consultation::getMostCommon();

        // Handle the case where the record with center_id = 73 doesn't exist
    }
    return view('center', compact('about','centers','center','thirdValue','spicials','mostCommonMessages'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Center $center)
{
    // Delete the center
    $center->delete();

    return redirect()->back()->with('success', 'Center deleted successfully');
}
public function edit(Center $cente)
{
    $cente = Center::where('centers.id',$cente->id)->first();

    $centers = Center::all();
    $center = Center::get('centername');
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
    $spicials=Spicialization::all();
    $data=Spicialization::all();
$comp = compact('cente','data','centers','spicials','allusers','usersnum','centerssnum','center');
    
    return redirect()->route('addcenter')->with($comp);
}

}