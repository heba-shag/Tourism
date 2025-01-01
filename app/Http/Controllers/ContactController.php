<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Center;
use App\Models\Spicialization;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    //
    public function index()
    {
        $centers = Center::all();
        $ratecenter = Center::get('star');
        $spicials=Spicialization::all();

        return view('contact',compact('centers','spicials','ratecenter'));
    }

    public function store(Request $request)
    {
        $contact = Contact::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success', 'تم ارسال رسالتك سيتم التواصل معك');
    }

    public function show()
    {
        $center = Center::all();
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
        $contacts = Contact::all();
        $visitor = Visitor::first()->count;

        return view('admin.contact',compact('center','users','allusers','usersnum','centerssnum','contacts','visitor'));
    }
}
