<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $currentSessionID = $request->session()->get('session_id');

        if(!$currentSessionID){
            $currentTimeStamp = time();
            $request->session()->put('session_id', $currentTimeStamp);
            session(['session_id' => $currentTimeStamp]);
            $currentSessionID = $currentTimeStamp;
        }

        echo "current_session_id $currentSessionID";

        $result = Todolist::where(['status'=> 1, 'session_id'=> $currentSessionID])->orderByDesc('id')->get();
        return view('index', ['tasks'=>$result]);

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
        $currentSessionID = $request->session()->get('session_id');

        $todolist = Todolist::create([
            'task_description' => $request->input('task_description'),
            'session_id' => $currentSessionID
        ]);

        return redirect('/tasks');

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
        $todolist = Todolist::where('id', $id)->update([
            'status'=> 0
        ]);

        return redirect('/tasks');
    }
}
