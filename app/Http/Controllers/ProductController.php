<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        try{
            $viewData = [];
            $product = Product::findOrFail($id);
            $viewData["title"] = $product["name"]." - Online Store";
            $viewData["subtitle"] =  $product["name"]." - Product information";
            $viewData["product"] = $product;
            return view('product.show')->with("viewData", $viewData);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        
    }

    public function create()
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "gt:0"
        ]);
        
        Product::create($request->only(["name","price"]));

        return back();
    }
}