@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lid Bewerken</h1>
    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" value="{{ $member->naam }}" required>
        </div>
        <div class="form-group">
            <label for="team_id">Team</label>
            <select class="form-control" id="team_id" name="team_id" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $member->team_id == $team->id ? 'selected' : '' }}>{{ $team->naam }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>
@endsection
