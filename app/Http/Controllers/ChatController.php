<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatModel;
use App\Http\Requests\StoreChatRequest;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatEvent;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:user']);
    }

    public function index()
    {
        $chats = ChatModel::all();
        return view('chat.chat', compact('chats'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['author'] = Auth::user()->username;
        $data['receiver'] = $request->receiver;
        $chats = ChatModel::create($data);

        event(
            new ChatEvent($chats)
        );

        return redirect()->route('chats.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

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
