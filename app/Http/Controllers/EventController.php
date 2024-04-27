<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Event $event)
    {
        $event->confirmed_by = Auth::id(); // Set the ID of the currently logged-in staff user
        $event->save();

        return redirect()->route('events.index')->with('success', 'Event confirmed successfully.');
    }

    public function index()
    {
        $userType = Auth::user()->type;

        if ($userType == 'user') {
            $events = Event::where('user_id', Auth::id())->get();
        } else {
            $events = Event::all();
        }

        return view('events.index', compact('events'))
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'date' => 'required|date',
            'participants' => 'required|integer',
            'setup' => 'required',
        ]);

        $event = Event();
        $event->type = $request->input('type');
        $event->date = $request->input('date');
        $event->participants = $request->input('participants');
        $event->setup = $request->input('setup');
        $event->user_id = Auth::id(); // Associate the event with the authenticated user
        $event->save();

        return redirect()->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
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
        $request->validate([
            'type' => 'required',
            'date' => 'required|date',
            'participants' => 'required|integer',
            'setup' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
