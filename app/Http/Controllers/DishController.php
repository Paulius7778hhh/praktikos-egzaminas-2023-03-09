<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('back.add-dish', ['restaurants' => $restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = new Dish;
        $dish->title = $request->title;
        $dish->restaurant_id = $request->restaurant_id;
        if ($request->file('picture')) {
            $picture = $request->file('picture');
            $ext = $picture->getClientOriginalExtension();

            $name = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            $picture->move(public_path() . '/dishpictures/', $file);

            $dish->picture = '/dishpictures/' . $file;
        }
        $dish->description = $request->description;
        $dish->save();

        return redirect()->route('admin-welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish, Restaurant $restaurant)
    {

        $dish = Dish::all();
        return view('back.restaurant-meniu', [
            'dishes' => $dish,
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $restaurants = Restaurant::all();
        return view('back.edit-dish', [
            'restaurants' => $restaurants,
            'dish' => $dish,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $dish->title = $request->edit_title;
        $dish->restaurants_id = $request->edit_restaurants_id;
        if ($request->file('edit_picture')) {
            $picture = $request->file('edit_picture');
            $ext = $picture->getClientOriginalExtension();

            $name = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            if (isset($dish->picture)) {
                $dish->nopic();
            }
            if (isset($dish->picture)) {
                $dish->picture = null;
            }
            $picture->move(public_path() . '/dishpictures/', $file);
            $dish->edit_picture = '/dishpictures/' . $file;
        }
        $dish->price = $request->edit_price;

        $dish->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin-restaurant-menu')->with('Deletion success');
    }
}
