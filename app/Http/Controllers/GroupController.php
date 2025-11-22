<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function index()
    {
        return view('groups.index');
    }

    public function create()
    {
        return view('groups.create');

    }

    public function store(Request $request)
    {

        if (! Auth::check()) {
            abort(403);
        }

        $request->validate([
            'parash' => 'required|string',
            'diocese' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ]);

        $group = Group::create([
            'parash' => $request->parash,
            'diocese' => $request->diocese,
            'city' => $request->city,
            'state' => $request->state,
            'access_key' => 'PAROQ-' . now()->format('Y') . '-' . strtoupper(Str::random(6)),
            'owner_id'  => Auth::id(),
        ]);

        $group->users()->attach(Auth::id(), [
            'is_coordinator' => true,
        ]);

        return redirect()
            ->route('groups.index')
            ->with('success', 'Grupo criado com sucesso!');
    }

    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
