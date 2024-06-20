@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Leden</h1>
    <a href="{{ route('members.create') }}" class="btn btn-primary">Nieuw Lid</a>
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Team</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->naam }}</td>
                    <td>{{ $member->team->naam }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member) }}" class="btn btn-warning">Bewerken</a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST" style="display:inline;">
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
