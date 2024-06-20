@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuw Lid</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" required>
        </div>
        <div class="form-group">
            <label for="team_id">Team</label>
            <select class="form-control" id="team_id" name="team_id" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->naam }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
