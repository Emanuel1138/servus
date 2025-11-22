@extends('layouts.app')

@section('title', 'Servus | Dashboard')

@section('content')
    <div class="flex">
        <x-dashboard-sidebar :group="$group" />
        <main>
            oioi
        </main>
    </div>
@endsection

