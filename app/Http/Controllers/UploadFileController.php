<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
 
class UploadFileController extends Controller {
 
  public function showUploadFile(Request $request){
     $file = $request->file('image');
  
     // отображаем имя файла
     echo 'File Name: '.$file->getClientOriginalName();
     echo '<br>';
  
     //отображаем расширение файла
     echo 'File Extension: '.$file->getClientOriginalExtension();
     echo '<br>';
  
     //отображаем фактический путь к файлу
     echo 'File Real Path: '.$file->getRealPath();
     echo '<br>';
  
     //отображаем размер файла
     echo 'File Size: '.$file->getSize();
     echo '<br>';
  
     //отображаем Mime-тип файла
     echo 'File Mime Type: '.$file->getMimeType();
  
     //перемещаем загруженный файл
     $destinationPath = 'uploads';
     $file->move($destinationPath,$file->getClientOriginalName());
  }
}