<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dish;
use App\Models\Restaurant;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        $dishes = Dish::all();
        return view(
            'back.index',
            [
                'dishes' => $dishes,
                'restaurants' => $restaurants,
            ]
        );
    }
    public function common()
    {
        if (Auth::user()?->role == 'user') {
            return redirect()->route('user-welcome');
        } else {
            return redirect()->route('admin-welcome');
        }
    }
    public function guestindex()
    {
        $title = 'Welcome';
        $restaurants = Restaurant::all();
        $dishes = Dish::all();
        return view(
            'front.index',
            [
                'dishes' => $dishes,
                'restaurants' => $restaurants,
                'title' => $title,
            ]
        );
    }
    public function show(Dish $dish, Restaurant $restaurant)
    {
        $title = 'Restaurant meniu';
        $dish = Dish::all();
        return view('front.guest-r-meniu', [
            'dishes' => $dish,
            'restaurant' => $restaurant,
            'title' => $title,
        ]);
    }
}
