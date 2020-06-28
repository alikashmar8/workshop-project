<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;
use App\Idea;
use DB;
use App\Rate;
use App\User;

class ShuffelingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $rates = Rate::all()->where("newUserId", "=", $user['id'])->where("used", "=", 0);
        $ideas = Idea::all();
        return view('ideasToRate', compact('rates', 'ideas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function shuffle()
    {
        $activeWorkshopId = $_POST["workshopId"];
        $ratesNb = Rate::all()->where('workshopId', '=', $activeWorkshopId)->where('used', '=', 0)->count();
        if ($ratesNb == 0) {
            $activeWorkshop = Workshop::find($activeWorkshopId, "id")->get();
            $ideas = Idea::where("workshopId", $activeWorkshopId)->get();
            //echo $ideas;

            foreach ($ideas as $idea) {
                $user[] = $idea["userId"];
            }
            shuffle($user);
            //unSet($user[0]);
            foreach ($ideas as $idea) {
                $rate = new Rate();
                $rate->ideaSourceId = $idea["id"];
                $rate->rate = 0;
                $rate->used = 0;
                $rate->workshopId = $activeWorkshopId;
                $i = 0;
                while ($i < count($ideas) && $i < count($user)) {

                    if (($this->hasVoted($user[$i], $idea["id"], $activeWorkshopId) == false) && ($idea["userId"] != $user[$i])) {

                        $rate->newUserId = $user[$i];
                        $rate->save();
                        unSet($user[$i]);
                        shuffle($user);
                        //$i=100;
                        break;
                    }
                    $i++;
                }

            }
        }
        //$ideas = Idea::find($activeWorkshopId,"workshopId")->get();
        //print_r($ideas);
//        $activeWorkshop->round = $activeWorkshop->round + 1;
//        $activeWorkshop->save();
        $rates = Rate::all()->where('workshopId', '=', $activeWorkshopId)->where('used', '=', 0);

        $users = User::all();
        $ideas = Idea::all()->where('workshopId', '=', $activeWorkshopId)->where('owner', '=', 1);
        return view('shuffledIdeas', compact('rates', 'ideas', 'users'));
    }

    public function hasVoted($uid, $iid, $wid)
    {
        $votes = Rate::where("workshopId", $wid)->get();
        //  echo $votes;
        //  return true;
        // $votes =   DB::select("SELECT * from rates where workshopId = ".$wid);
        //print_r($votes);
        if (count($votes) == 0) {
            return false;
        } else {
            foreach ($votes as $vote) {
                if ($vote["ideaSourceId"] == $iid && $vote["newUserId"] == $uid) {
                    return true;
                }
            }
        }
        return false;
    }

    public function rate()
    {
        $rateId = $_POST['rate'];
        $ideaId = $_POST['idea'];
        $userRate = $_POST['rating'];
        $rate = Rate::all()->where('id', '=', $rateId);
        $idea = Idea::all()->where('id', '=', $ideaId);
        $idea->first()->rate = $userRate + $idea->first()->rate;
        $rate->first()->rate = $userRate;
        $rate->first()->used = 1;
        $idea->first()->save();
        $rate->first()->save();
        $user = auth()->user();
        $rates = Rate::all()->where("newUserId", "=", $user['id'])->where("used", "=", 0);
        $ideas = Idea::all();
        return view('ideasToRate', compact('rates', 'ideas'));
    }
}
