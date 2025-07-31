<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class MessageController extends Controller
{
    public function index()
    {
        $receivedMessages = Message::with('receiver')->where('receiver_id', Auth::id())->get();
        $sentMessages = Message::with('receiver')->where('sender_id', Auth::id())->get();
        $users = User::where('id', '!=', Auth::id())->get();
        return view('admin.messages.index', compact('receivedMessages', 'sentMessages', 'users'));
    }
    

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('admin.messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return redirect()->route('messages.index')->with('success', 'Message sent successfully.');
    }

    public function show(Message $message)
    {
        // Ensure that the authenticated user is either the sender or receiver of the message
        if ($message->receiver_id != Auth::id() && $message->sender_id != Auth::id()) {
            abort(403);
        }
    
        // Load the sender and receiver relationships with the message
        $message->load('sender', 'receiver');
    
        return view('admin.messages.show', compact('message'));
    }

public function destroy(Message $message)
{
    // Ensure that the authenticated user is the sender of the message
    if ($message->sender_id != Auth::id()) {
        abort(403);
    }

    // Delete the message
    $message->delete();

    return Redirect::back()->with('success', 'Message deleted successfully.');
}
}
