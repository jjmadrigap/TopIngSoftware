<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;

class ImageController extends Controller
{
    public function index(){
        return view('image.index');
    }

    public function save(Request $request){
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        return back();
    }
}
