<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
         $max_size = (int)ini_get('upload_max_filesize') * 1000;
    $all_ext = implode(',', $this->allExtensions());

    $this->validate($request, [
      'name' => 'required|unique:files',
      'file' => 'required|file|mimes:' . $all_ext . '|max:' . $max_size
    ]);

    $model = new File();

    $file = $request->file('file');
    $ext = $file->getClientOriginalExtension();
    $type = $this->getType($ext);

    if (Storage::putFileAs('/public/' . $this->getUserDir() . '/' . $type . '/', $file, $request['name'] . '.' . $ext)) {
      return $model::create([
          'name' => $request['name'],
          'type' => $type,
          'extension' => $ext,
          'user_id' => Auth::id()
        ]);
    }
//         $file = $request->file('file');
//         //перемещаем загруженный файл
//         $destinationPath = 'uploads';
//         $file->move($destinationPath,$file->getClientOriginalName());
      }
}
