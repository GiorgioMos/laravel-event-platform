<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view("admin.events.index", compact("events", "tags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view("admin.events.create", compact("users", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $validati = $request->validated();
        $percorso = Storage::disk("public")->put('/uploads', $request['img']);
        $validati["img"] = $percorso;

        $newEvent = new Event();
        //i dati devono essere popolati nel model
        $newEvent->fill($validati);
        $newEvent->save();


        //Salva i tags in caso di essere presenti nel form
        if ($request->tags) {
            $newEvent->tags()->attach($request->tags);
        }



        return redirect()->route("admin.events.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view("admin.events.show", compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $users = User::all();

        return view("admin.events.edit", compact("event", "users", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $dati_validati = $request->validated();
        if ($request->hasFile("img")) {

            if ($event->img) {

                Storage::disk("public")->delete($event->img);
            }
            $percorso = Storage::disk("public")->put('/uploads', $request['img']);
            $dati_validati["img"] = $percorso;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route("admin.events.index");
    }
}
