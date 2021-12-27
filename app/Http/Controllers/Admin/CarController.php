<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Image;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all from the Car Table
        $cars = Car::all();
        $images = Image::all();
        return view('admin.cars.index', [
            //put $cars into 'car' then
            // the view will see the cars (the green one below)
            'cars' => $cars,
            'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // when user clicks submit on the create view above
        // the festival will be stored in the DB
        $request->validate([
            'make' => 'required|min:3',
            'model' =>'required|min:3',
            'price' => 'required',
            'engine_size' => 'required',
            'file' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,bmp,png'
            ]);

            
            $request->file->store('image', 'public');
            
            $image = new Image([
                "file" => $request->file->hashName()
            ]);
            $image->save(); //save the record
            // $file_id = $image->id
        }

        // $image_id = Image::findOrFail($image_id);

        // if validation passes create the new book
        $car = new Car();
        $car->make = $request->input('make');
        $car->model = $request->input('model');
        $car->price = $request->input('price');
        $car->engine_size = $request->input('engine_size');
        $car->image_id = $image->id;
        $car->save();

        return redirect()->route('admin.cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        $image = Image::findOrFail($id);

        return view('admin.cars.show', [
            'car' => $car,
            'image' => $image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the car by ID from the Database
        $car = Car::findOrFail($id);
        $image = Image::findOrFail($id);

        // Load the edit view and pass the festival to
        // that view
        return view('admin.cars.edit', [
            'car' => $car,
            'image' => $image
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // first get the existing festival that the user is update
        $car = Car::findOrFail($id);
        $image = Image::findOrFail($id);
        $request->validate([
            'make' => 'required|min:3',
            'model' =>'required|min:3',
            'price' => 'required',
            'engine_size' => 'required',
            'file' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,bmp,png'
            ]);

            
            $request->file->store('image', 'public');
            
            $image = new Image([
                "file" => $request->file->hashName()
            ]);
            $image->update(); //save the record
            // $file_id = $image->id
        }

        // if validation passes then update existing festival
        $car->make = $request->input('make');
        $car->model = $request->input('model');
        $car->price = $request->input('price');
        $car->engine_size = $request->input('engine_size');
        $car->image_id = $image->id;
        $car->save();

        return redirect()->route('admin.cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('admin.cars.index');
    }
}
