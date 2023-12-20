<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ReservationController extends Controller
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
    public function create(Request $request)
    {
        $user_name = Auth::user()->name;
        $restaurant = Restaurant::find($request->restaurant_id);
        return view('reservations.create',compact('restaurant','user_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $week_jp = ["日", "月", "火", "水", "木", "金", "土"];
        $restaurant = Restaurant::find($request->restaurant_id);
        if (!$restaurant) {
            return back()->withErrors(['message' => 'レストランが存在しません']);
        }
        $request->validate([
            'reservationday' => 'required'  ,
            'reservationnumber' => 'required' 
        ]);

        $reservationday = new DateTime($request->input('reservationday'));


        if (new DateTime() > $reservationday) {
            return back()->withInput($request->input())->withErrors(['message' => '現在より過去の予約日時は指定できません。']);
        }

        foreach(explode(',',$restaurant->holiday) as $holiday){
            if(array_search($holiday,$week_jp) == $reservationday->format('w')){
                return back()->withErrors(['message' => '定休日です。']);
            }
        }$time_start_end = explode('～',$restaurant->time);

        if($time_start_end[0] > $reservationday->format('H:i') || $time_start_end[1] < $reservationday->format('H:i')){
             return back()->withErrors(['message' => '営業時間外です。']);
         }

         $reservation = new Reservation();
         $reservation->restaurant_id = $request->input('restaurant_id');
         $reservation->reservationday = $reservationday->format(('Y:m:d H:i:s'));
         $reservation->reservationnumber = $request->input('reservationnumber');
         $reservation->user_id = Auth::user()->id;
        
         $reservation->save();            
         return redirect()->route('restaurants.show',$restaurant->id)->with('message', '予約が完了しました。');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('mypage.reservations')->with('message', '予約をキャンセルしました。');
    }
}
