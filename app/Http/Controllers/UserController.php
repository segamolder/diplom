<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App;
use App\File;
use App\Models\Widget;
use App\Models\PhoneNumber;


class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user');
    }

    public function getAllImages()
    {
        $widget = new Widget();
        $files = $widget::where('user_id', Auth::id())->get();
        return response()->json($files);
    }

    public function getPhoneNumber()
    {
        $phone = new PhoneNumber();
        $phones = $phone::where('user_id', Auth::id()) -> get();
        return response()->json($phones);
    }
}