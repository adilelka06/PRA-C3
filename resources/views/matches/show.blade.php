@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Wedstrijd</h1>
        <p>{{ $match->team1->name }} vs {{ $match->team2->name }}</p>
        @if ($match->score1 !== null && $match->score2 !== null)
            <p>Uitslag: {{ $match->score1 }}:{{ $match->score2 }}</p>
        @else
            @if (auth()->user()->is_admin)
                <form action="{{ route('matches.generateOutcome', $match->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Genereer Uitslag</button>
                </form>
            @endif
        @endif
    </div>
@endsection
