<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return view('profile.show', compact('profile'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        $validated = $request->validate([
            'first_name'        => ['required', 'string', 'max:255'],
            'last_name'         => ['nullable', 'string', 'max:255'],
            'phone'             => ['nullable', 'string', 'max:20'],
            'birth_date'        => ['nullable', 'string'], 
            'investiture_date'  => ['nullable', 'string'],
        ]);

        if (!empty($request->birth_date)) {
            $validated['birth_date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request->birth_date)
                ->format('Y-m-d');
        }

        if (!empty($request->investiture_date)) {
            $validated['investiture_date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request->investiture_date)
                ->format('Y-m-d');
        }

        $profile->update($validated);

        return redirect()
            ->back()
            ->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy(Profile $profile)
    {
        //
    }
}
