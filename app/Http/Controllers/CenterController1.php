<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Spicialization;
use App\Models\User;
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
    public function index()
    {
        $centerss = Center::all();
        $center = Center::all();
        $center = Center::get('centername');
        return view('aboutCenter',compact('center','centerss'));
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
        $data=Spicialization::all();
        return view('admin.addcenter',compact('centers','users','allusers','usersnum','centerssnum','centerName','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
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

    public function storre(Request $request)
    {
        $center = Center::create([
            'centername' => $request->username,
             'email' => $request->email,
             'phone' => $request->phone,
             'description' => $request->description,
        ]);
        return redirect()->back()->with('success', 'تم ارسال رسالتك سيتم التواصل معك');
   

        // if($request->centername == null){
        //     echo 'eror';
        //     // return view('admin.adminhome');
        // }
        // $input = $request->all();
        // $center = Center::create($input);
        // if($request->hasFile('image')){
        //     // $center->addMediaFromRequest('image')->toMediaCollection('image');
        //     $imageName = time() . '_' . md5(Str::random(2)) . '_' . uniqid() . '.' . $request->image->extension();
        //     $imagePath = public_path('/images');
        //     $request->image->move($imagePath, $imageName);
        // }
        // return redirect()->route('addcenter');

        // $ur =Center->addMediaFromRequest('image')->toMediaCollection('images');
        // if ($request->file('image')) {
        //     $path = $request->file('image')->store('public/images');
        // }else{
        //     return view('admin.adminhome');
        // }
        
        // $path = $request->file('image')->store('public/images');
        
        // // Save the image URL in the database
        // $image = new Image;
        // $image->url = $url;
        // $image->save();
        
        // $url = Storage::url($path);
        // $center = Center::create([
        //     'centername' => $request->centername,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'description' => $request->description,
        //     'site' => $request->site,
        //     // 'country' => $request->country,
        //     'image' => "/images/$imagePath"
        // ]);
        // return redirect()->back()->with('success', 'تم ارسال رسالتك سيتم التواصل معك');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centerss = Center::all();
        $center = Center::all();
        $spec = Spicialization::all();
        // $c = DB::table('centers')
        //         ->where('id', $id);
        $about = Center::with('spicializations')->where('id',$id)->get();

        // $m =DB::table('centers')->select('E-mail')->where('id',$id)->get();
        return view('aboutCenter',compact('center','about','centerss'));
       
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
