<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request  $request)
    {
        //
        $categories = catagory::all();
        return view('admin.products.create', compact('categories'));
    }


    public function change_status($id)
    {
        $product = Product::where('id', $id)->first();
        if($product->status == 1)
        {
            $product->update(['status'=>0]);
        }
        else{
            $product->update(['status'=>1]);
        }
        return redirect()->back()->with('message', "Status changed successfully");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $product = new Product();

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $is_featured = $request->input('checkbox');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('products', $filename);
            $product->image = $filename;
        }
        $product->cat_id = $request->input('cat_id');
        $checked = $request->input('checkbox');
        if ($checked){
            $product->is_featured = 1;
        }else {
            $product->is_featured = 1;
        }
        $product->regular_price = $request->input('regular_price');
        $product->offer_price = $request->input('offer_price');
        $product->rating = $request->input('rating');
        $product->size = $request->input('size');
        $product->instagram_url = $request->input('instagram_url');

        $product->save();
        return redirect()->back()->with('message', 'Product created successfully');


    }

    public function popup($id){

        $product = Product::where('id', $id)->first();
        return response()->json($product);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        //
        $products = Product::where('id', $id)->first();
        return  view('admin.products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, $id)
    {
        $product = Product::where('id', $id)->first();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::where('id', $id)->first();
        $delete = $product->delete();
        if($delete)
        {
            return redirect()->back()->with('message', "Product Deleted Successfully");
        }
    }
}
