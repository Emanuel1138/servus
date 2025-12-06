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

        return redirect()->route('formations.edit', $formation->slug);

    }

    public function show(Formation $formation)
    {
        //
    }

    public function edit(Formation $formation)
    {
        $group = $formation->group;

        return view('dashboard.formations.edit', compact('formation', 'group'));
    }


    public function update(Request $request, Formation $formation)
    {
        if (! Auth::check()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body_html' => 'nullable|string',
            'body_delta' => 'nullable|json',
            'is_public' => 'boolean',
        ]);

        if ($validated['body_html'] === null || $validated['body_html'] === '') {
            unset($validated['body_html']);
        }
        if ($validated['body_delta'] === null || $validated['body_delta'] === '') {
            unset($validated['body_delta']);
        }

        if (isset($validated['title']) && $validated['title'] !== $formation->title) {
            $validated['slug'] = Str::slug($validated['title']);

            $count = Formation::where('slug', 'like', "{$validated['slug']}%")
                            ->where('id', '!=', $formation->id)
                            ->count();
            if ($count > 0) {
                $validated['slug'] .= '-' . ($count + 1);
            }
        }

        $validated['last_edited_by'] = Auth::id();

        $formation->update($validated);

        return redirect()->route('formations.edit', compact('formation'))->with('success', 'Formação atualizada com sucesso!');
    }


    public function destroy(Formation $formation)
    {
        //
    }
}
