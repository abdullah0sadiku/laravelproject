<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $messages = [];
        return view('Teamsupport.index', compact('users', 'messages'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:255',
        ]);
    
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->input('receiver_id'),
            'content' => $request->input('content'),
        ]);
    
        return back()->with('success', 'Message sent successfully!');
    }

    
    public function show(User $user)
    {
        $users = User::where('id', '!=', Auth::id())->get();
        
        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)->where('receiver_id', Auth::id());
        })->latest()->get();
    
        return view('Teamsupport.index', compact('user', 'messages', 'users'));
    }
}
