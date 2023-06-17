<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catagory;

class catagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catagories = catagory::all();
        return view('admin.catagory.index', compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.catagory.create');
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
        $catagory = new catagory;
        $catagory->id = $request->catagory;
        $catagory->name = $request->name;
        $catagory->description = $request->description;
        $checked = $request->checkbox;
        if ($checked){
            $catagory->is_popular = 1;
        }else {
            $catagory->is_popular = 0;
        }



        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('catagory', $filename);
            $catagory->image = $filename;
        }
        $catagory->save();
        return redirect()->back()->with('message', 'Catagory created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(catagory $catagory)
    {
        //
        if($catagory->status == 1)
        {
            $catagory->update(['status'=>0]);
        }
        else{
            $catagory->update(['status'=>1]);
        }
        return redirect()->back()->with('message', "Status changed successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
          return view('admin.catagory.edit', compact('catagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
{
    // Validate form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'checkbox' => 'accepted'
    ]);

    // Update model
    $catagory->name = $validatedData['name'];
    $catagory->description = $validatedData['description'];

    $checked = $validatedData['checkbox'];
    if ($checked){
        $catagory->is_popular = 1;
    }else {
        $catagory->is_popular = 0;
    }

    if ($request->hasFile('image')) {
        $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('catagory', $filename);
            $catagory->image = $filename;
    }

    $update = $catagory->save();

    if ($update) {
        return redirect('/catagories')->with('message', "Category Updated Successfully");
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        //
        $delete = $catagory->delete();
        if($delete)
        {
            return redirect()->back()->with('message', "Category Deleted Successfully");
        }
    }
}
