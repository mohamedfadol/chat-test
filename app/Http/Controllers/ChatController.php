<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Messanger;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        return view('dashboard');
    }

    public function getMessages()
    {
        return Messanger::with('user.businesses')->get();
    }

    public function postMessages(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);
        broadcast(new MessageSent($message->load('user')))->toOthers();
        return ['status' => 'done'];
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
