<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App;
use App\File;


class HomeController extends Controller
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
        return view('home');
    }
    
  

    
    public function showUploadFile(Request $request){
        $model = new File();

        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $type = 'image';
        
        if (Storage::putFileAs('/public/' . $this->getUserDir(). '/' . $type . '/', $file, $request['name'] . '.' . $ext)) {
          return $model::create([
              'name' => $request['name'],
              'type' => $type,
              'extension' => $ext,
              'user_id' => Auth::id()
            ]);
        }
    }
    
    private function getUserDir()
    {
        return Auth::user()->name . '_' . Auth::id();
    }
        
    public function getImages($id) 
    {
        
        $model = new File();
        $files = $model::where('user_id', Auth::id())->paginate(10);
        $response = [
            'data' => $files
        ];
        
        return response()->json($files);
    }
        
}
