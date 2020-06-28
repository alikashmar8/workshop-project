<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;
use App\Idea;
use App\user;
use App\Rate;

class workshopIdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshop::all();
        $ideas = Idea::orderBy('rate', 'desc')->get();
        $users = User::all();
        $workshopIdd = $_GET["workshopId"];
        $rates = Rate::where('workshopId', '=', $workshopIdd);
        $ratesNb = Rate::where('workshopId', '=', $workshopIdd)->where('used', '=', 0)->count();
        //return $ratesNb;
        
        return view('workshopIdeas',compact('workshops','ideas','users','workshopIdd','rates','ratesNb'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
