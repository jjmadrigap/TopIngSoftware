<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductApi extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }
}
