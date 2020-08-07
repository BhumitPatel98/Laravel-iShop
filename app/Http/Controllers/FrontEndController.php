<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index',['products' => Products::paginate(3)]);
    }

    public function singleProduct($id)
    {
        return view('single',['products' => Products::find($id)]);
    }
}
