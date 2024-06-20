@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Wedstrijdresultaten</h1>
    <a href="{{ route('results.create') }}" class="btn btn-primary">Nieuw Wedstrijdresultaat</a>
    <table class="table">
        <thead>
            <tr>
                <th>Toernooi</th>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Score Team 1</th>
                <th>Score Team 2</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
                <tr>
                    <td>{{ $result->tournement->naam }}</td>
                    <td>{{ $result->team1->naam }}</td>
                    <td>{{ $result->team2->naam }}</td>
                    <td>{{ $result->team1_score }}</td>
                    <td>{{ $result->team2_score }}</td>
                    <td>
                        <form action="{{ route('results.destroy', $result) }}" method="POST" style="display:inline;">
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
