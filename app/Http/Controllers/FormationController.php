<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    private function generateUntitledName($groupId)
    {
        $base = 'Formação sem título';

        $count = Formation::where('group_id', $groupId)
            ->where('title', 'LIKE', $base . '%')
            ->count();

        return $count === 0 ? $base : $base . ' (' . $count . ')';
    }

    public function index($groupId)
    {
        $group = Group::findOrFail($groupId);

        return view('dashboard.formations.index', compact('group'));
    }

    public function create()
    {
        //
    }

    public function store($groupId)
    {
        if (! Auth::check()) {
            abort(403);
        }

        $group = Group::findOrFail($groupId);

        $title = $this->generateUntitledName($group->id);

        $slug = Str::slug($title) . '-' . Str::random(6);

        $formation = Formation::create([
            'group_id'       => $group->id,
            'title'          => $title,
            'slug'           => $slug,
            'body_html'      => null,       
            'body_delta'     => null,
            'is_public'      => false,
            'last_edited_by' => Auth::id(),
        ]);

        return redirect()
            ->route('formations.edit', [$formation->id]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        return view('dashboard.formations.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        //
    }
}
