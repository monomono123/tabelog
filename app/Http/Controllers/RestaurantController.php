<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category_id !== null) {
            $restaurants = Restaurant::where('category_id', $request->category_id);
            $total_count = $restaurants->count();  
            $restaurants = $restaurants->paginate(10);
        }else{
            $total_count =Restaurant::all()->count();
            $restaurants = Restaurant::paginate(10);
        }
        return view('restaurants.index', compact('restaurants','categories','total_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->input('name');
        $restaurant->description = $request->input('description');
        $restaurant->price = $request->input('price');
        $restaurant->save();

        return to_route('restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $reviews = $restaurant->reviews()->get();

        return view('restaurants.show', compact('restaurant', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->name = $request->input('name');
        $restaurant->description = $request->input('description');
        $restaurant->price = $request->input('price');
        $restaurant->update();

        return to_route('restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return to_route('restaurants.index');
    }

    public function favorite(Restaurant $restaurant)
    {
        Auth::user()->togglefavorite($restaurant);

        return back();
    }
}
