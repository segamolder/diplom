<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App;
use App\File;
use App\Models\Widget;


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


    public function showUploadFile(Request $request)
    {
        $model = new File();

        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $type = 'image';

        if (Storage::putFileAs('/public/' . $this->getUserDir() . '/' . $type . '/', $file, $request['name'] . '.' . $ext)) {
            return $model::create([
                'name' => $request['name'],
                'type' => $type,
                'extension' => $ext,
                'user_id' => Auth::id()
            ]);
        }
    }

    public function getUserDir()
    {
        return Auth::user()->name . '_' . Auth::id();
    }

    public function getUserId()
    {
        return Auth::id();
    }

    public function getImages($id)
    {
        $model = new File();
        $files = $model::where('user_id', Auth::id())->get();
        $response = [
            'data' => $files
        ];

        return response()->json($files);
    }

    public function saveAll(Request $request)
    {

        $widgetDataLayer = $request->getContent();
        $widgetData = json_decode($widgetDataLayer, true);
        xdebug_break();
        $widget = new Widget($widgetData);
//        //$test = $widgetData->bg_height;
//        $widget = $widgetData;
//        $widget->save();

        $widget->save();
    }

    public function updateAll(Request $request)
    {
        $widgetDataLayer = $request->getContent();
        $widgetData = json_decode($widgetDataLayer, true);
        //$this->saveCanvasImage($widgetData['canvas_image']);
        $widget = new Widget();
        xdebug_break();
        $name = $widgetData['name'];
        $matchThese = ['name' => $name, 'user_id' => Auth::id()];
        $test = $widget::where($matchThese);
        $test->update($widgetData);
        //$widget->;
        $test->save();
    }

//    public function saveCanvasImage(string $base) {
//        xdebug_break();
//
//        $fileData = base64_decode($base);
//        $fileName = 'photo.png';
//
//    }


}
