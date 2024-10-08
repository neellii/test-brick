<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreRequest;
use App\Http\Requests\Event\UpdateRequest;

class EventController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(10);
        return view("admin.event.index", compact(['events']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.event.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Event::create($request->validated());

        return redirect()->route("admin.events.index")->with("success","Мероприятиe успешно созданo");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view("admin.event.show", compact("event"));
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
       $categories = Category::all();

        return view("admin.event.edit", compact(['event', 'categories']));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Event $event)
    {
        $data = $request->validated();
        $event->update($data);
        $event->categories()->sync($data['categories']);

        return redirect()->route('admin.events.index', $event->id)->with('success', 'Мероприятиe успешно обновленo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route("admin.events.index")->with("success","Мероприятиe успешно удаленo");
    }
}
