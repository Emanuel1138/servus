<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Group;

class EventController extends Controller
{
    public function index($groupId)
    {
        $group = Group::findOrFail($groupId);
        $events = $group->events()->orderBy('event_date', 'asc')->get();

        return view('dashboard.events.index', compact('group', 'events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date_format:d/m/Y',
            'group_id' => 'required|exists:groups,id',
        ]);

        $validated['event_date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validated['event_date'])->format('Y-m-d');

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso!');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date_format:d/m/Y',
        ]);

        $validated['event_date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validated['event_date'])->format('Y-m-d');

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento excluído com sucesso!');
    }
}
