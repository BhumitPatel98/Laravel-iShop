<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Products;
use Illuminate\Http\Request;
use File;

class ProductsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products' =>Products::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request)
    {
       //dd($image = $request->image->store('product'));
       $image = $request->image->store('products');

        Products::create([

            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'discription' => $request->discription

        ]);
        
        session()->flash('success','New Product Added.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        //dd($product);
        //return Products::find($id);
        return view('products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, Products $product)
    {
        //return $request;
        //dd(request()->all());
        $data = request()->all();

        $product->name = $data['name'];

        $product->price = $data['price'];

        $product->discription = $data['discription'];

        //check if new image
        if($request->hasFile('image'))
        {
            //upload it
            $image = $request->image->store('products');

            //delete old one
            //$product->deleteimage();

            $data['image'] = $image;
        
        }
        //$product->save();
         //update attributes
         $product -> update($data);

         session()->flash('success','Product Is Updated');
         return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product=Products::find($id);
       //upload/products/name_of_image
        if(file_exists($product->image))
        {
            unlink($product->image);
        }
        $product->delete();

        session()->flash('error','Product Is Delete Successfull');

        return redirect(route('products.index'));


    }
}
