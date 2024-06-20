@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Wedstrijden</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (auth()->user()->is_admin)
            <form action="{{ route('matches.create') }}" method="POST" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-primary">Nieuwe Wedstrijd</button>
            </form>
        @endif
        <ul class="list-group mt-3">
            @foreach ($matches as $match)
                <li class="list-group-item">
                    <a href="{{ route('matches.show', $match->id) }}">
                        {{ $match->team1->name }} vs {{ $match->team2->name }}
                        @if ($match->score1 !== null && $match->score2 !== null)
                            - {{ $match->score1 }}:{{ $match->score2 }}
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
