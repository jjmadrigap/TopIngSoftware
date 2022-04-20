<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\ImageLocalStorage;

class ImageNotDIController extends Controller
{
    public function index(){
        return view('imagenotdi.index');
    }

    public function save(Request $request){
        $storeImageLocal = new ImageLocalStorage();
        $storeImageLocal->store($request);
        return back();
    }
}
