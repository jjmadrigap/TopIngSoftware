<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $products = array(); //this simulates the database
        $products[121] = array("name"=>"Tv samsung", "price"=>"1000");
        $products[11] = array("name"=>"Iphone", "price"=>"2000");

        $productsInCart = [];
        $ids = $request->session()->get("products"); //we get the ids of the products stored in session
        if($ids){
            foreach ($products as $key => $product) {
                if(in_array($key, array_keys($ids))){
                    $productsInCart[$key] = $product;
                }
            }
        }

        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["subtitle"] =  "Shopping Cart";
        $viewData["products"] = $products;
        $viewData["productsInCart"] = $productsInCart;

        return view('cart.index')->with("viewData",$viewData);
    }

    public function add($id, Request $request)
    {
        $products = $request->session()->get("products");
        $products[$id] = $id;
        $request->session()->put('products', $products);
        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }
}
