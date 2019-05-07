<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App;
use App\File;
use App\Models\Widget;
use App\Models\PhoneNumber;


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
        $unCheck = new Widget();
        $unCheckItems = $unCheck::where(['user_id' => Auth::id(), 'active'=>true])->get();
        foreach ($unCheckItems as $unCheckItem) {
            $unCheckItem->active = false;
            $unCheckItem->save();
        }

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
        //$name = $widgetData['name'];
        //$matchThese = ['active' => true, 'user_id' => Auth::id()];
       $widget->where(['active' => true, 'user_id' => Auth::id()])->update($widgetData);
       // $widget->where(['active' => true, 'user_id' => Auth::id()])->user()->save($widgetData);

        //$test->update($widgetData)->save();
        //$widget->;

        //$test->save();
    }

//    public function saveCanvasImage(string $base) {
//        xdebug_break();
//
//        $fileData = base64_decode($base);
//        $fileName = 'photo.png';
//
//    }
    public function setTemplateActive(Request $request) {
        $widgetDataLayer = $request->getContent();
        $widgetData = json_decode($widgetDataLayer, true);
        xdebug_break();
        $name = $widgetData['name'];
        $unCheck = new Widget();
        $unCheckItems = $unCheck::where(['user_id' => Auth::id(), 'active'=>true])->get();
        foreach ($unCheckItems as $unCheckItem) {
            $unCheckItem->active = false;
            $unCheckItem->save();
        }

        $widget = new Widget();
        $matchThese = ['name'=>$name, 'user_id' => Auth::id()];
        $up = $widget::where($matchThese);
        $up->update(['active'=>true]);
        $up->save();

    }

    public function getTemplateInfo() {
        $widget = new Widget();
        $files = $widget::where(['active'=>true, 'user_id'=>Auth::id()])->get();

        return response()->json($files);
    }

    public function getWidgetInfo($name, $id) {
        xdebug_break();
        $widget = new Widget();
        $widgetData = $widget::where(['name' => $name, 'user_id' => $id])->get();
        //$widgetResult = response()->json($widgetData);
        return view('widget')->with('widget', $widgetData[0]);
    }

    public function sendNumber(Request $request) {
        xdebug_break();
        $numberDataLayer = $request->getContent();
        $numberData = json_decode($numberDataLayer, true);
        PhoneNumber::create($numberData);
        //$phone->save();
    }
}
