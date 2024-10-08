<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
     /**
     * Sign up user to event.
     */
    public function subscribe(Event $event)
    {  
        $event->users()->toggle(Auth::id());
        $user = Auth::user();
        return redirect()->route('home')->with('success', 'записи обновлены');
    }

     /**
     * Sign up user to event.
     */
    public function index()
    {
        $events = Auth::user()->events;

        return view('user.events', compact('events'));
    }

}
