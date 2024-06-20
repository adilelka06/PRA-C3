@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teams</h1>
    <a href="{{ route('teams.create') }}" class="btn btn-primary">Nieuw Team</a>
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->naam }}</td>
                    <td>
                        <a href="{{ route('teams.edit', $team) }}" class="btn btn-warning">Bewerken</a>
                        <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
