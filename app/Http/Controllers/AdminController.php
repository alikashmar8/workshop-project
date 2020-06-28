<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Workshop;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("adminHome")->with('users', $users);
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
    public function edit()
    {
        if (isSet($_POST['activate'])) {
            $checkboxes = $_POST['activate'];
            $N = count($checkboxes);
            if ($N > 0)
                foreach ($checkboxes as $user_id) {
                    $user = User::find($user_id);
                    $user->activated = 1;
                    $user->save();
                }
        }
        if (isSet($_POST['changeRole'])) {
            $roles = $_POST['changeRole'];
            $n = count($roles);
            if ($n > 0) {
                foreach ($roles as $user_id) {
                    $user = User::find($user_id);
                    $user->type = 1;
                    $user->save();
                }
            }
        }
        if (isSet($_POST['onOffActivate'])) {
            auth()->user()->activated = 1;
            $user = auth()->user();
            $user->activated = 1;
            $user->save();

        } else {
            auth()->user()->activated = 0;
            $user = auth()->user();
            $user->activated = 0;
            $user->save();
        }


        $users = User::all();
        $workshops = Workshop::all();
        $act = auth()->user()->activated;


        return view("home", compact('workshops', 'users', 'act'));
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
}
