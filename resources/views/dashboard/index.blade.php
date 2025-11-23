@extends('layouts.app')

@section('title', 'Servus | Dashboard')

@section('content')
    <div class="flex">
        <x-dashboard-sidebar :group="$group" />
        <main class="flex-1 p-8 min-h-screen">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard</h1>
            </div>
        </main>
    </div>
@endsection

