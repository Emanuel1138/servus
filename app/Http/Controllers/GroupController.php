<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function index()
    {
        if (! Auth::check()) {
            abort(403);
        }

        $user = Auth::user();

        $groups = $user->groups;

        return view('groups.index', compact('groups'));
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

    public function edit(Group $group)
    {
        //
    }

    public function update(Request $request, Group $group)
    {
        if (! Auth::check()) {
            abort(403);
        }

        $isCoordinator = $group->users()
            ->where('user_id', Auth::id())
            ->wherePivot('is_coordinator', true)
            ->exists();

        if (! $isCoordinator) {
            abort(403, 'Você não tem permissão para atualizar este grupo.');
        }

        $request->validate([
            'parash' => 'required|string',
            'diocese' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ]);

        $group->update([
            'parash' => $request->parash,
            'diocese' => $request->diocese,
            'city' => $request->city,
            'state' => $request->state,
        ]);

        return redirect()
            ->route('dashboard.settings', ['groupId' => $group->id])
            ->with('success', 'Grupo atualizado com sucesso!');
    }


    public function destroy(Group $group)
    {
        if (! Auth::check()) {
            abort(403);
        }

        $isCoordinator = $group->users()
            ->where('user_id', Auth::id())
            ->wherePivot('is_coordinator', true)
            ->exists();

        if (! $isCoordinator) {
            abort(403, 'Você não tem permissão para deletar este grupo.');
        }

        $group->delete();

        return redirect()
            ->route('groups.index')
            ->with('success', 'Grupo deletado com sucesso!');
        }
}
