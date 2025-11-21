@extends('layouts.app')

@section('title', 'Servus | Groups')

@section('content')
    <section>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600 hover:underline">
                Sair
            </button>
        </form>

    </section>
@endsection

