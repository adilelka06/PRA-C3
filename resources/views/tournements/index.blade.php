@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Toernooien</h1>
    <a href="{{ route('tournements.create') }}" class="btn btn-primary">Nieuw Toernooi</a>
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tournements as $tournement)
                <tr>
                    <td>{{ $tournement->naam }}</td>
                    <td>
                        <a href="{{ route('tournements.edit', $tournement) }}" class="btn btn-warning">Bewerken</a>
                        <form action="{{ route('tournements.destroy', $tournement) }}" method="POST" style="display:inline;">
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
