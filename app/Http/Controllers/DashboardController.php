<?php

namespace App\Http\Controllers;
use App\Models\Group;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show($groupId)
    {
        $group = Group::findOrFail($groupId);

        return view('dashboard.index', compact('group'));
    }
}
