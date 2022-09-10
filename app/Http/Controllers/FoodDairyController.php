<?php

namespace App\Http\Controllers;

use App\Models\AddFood;
use App\Models\FoodDairy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodDairyController extends Controller
{
    public $breakfast;
    public $lunch;
    public $dinner;
    public $user_id;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = AddFood::select()->get();
        $dairies = FoodDairy::whereDate('created_at', Carbon::today())->get();
        $dairies_yes = FoodDairy::whereDate('created_at', Carbon::yesterday())->get();
        return view('food_dairy', compact('foods', 'dairies', 'dairies_yes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function breakfast()
    {
        return view();
    }
    public function lunch()
    {
        return view();
    }
    public function dinner()
    {
        return view();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {


            $foods = new FoodDairy();
            $foods->breakfast = $request->breakfast;
            $foods->lunch = $request->lunch;
            $foods->dinner = $request->dinner;
            $foods->user_id = Auth::user()->id;
            $foods->save();
        }catch (\Exception $e) {
            return $e;
        }
        return redirect()->route('dairy');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodDairy  $foodDairy
     * @return \Illuminate\Http\Response
     */
    public function show(FoodDairy $foodDairy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodDairy  $foodDairy
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodDairy $foodDairy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodDairy  $foodDairy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodDairy $foodDairy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodDairy  $foodDairy
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodDairy $foodDairy)
    {
        //
    }
}
