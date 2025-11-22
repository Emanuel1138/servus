<?php

namespace App\Http\Controllers;
use App\Models\Group;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show($groupId)
    {
        $group = Group::findOrFail($groupId);

        return view('dashboard.settings', compact('group'));
    }
}
