@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Toernooi Bewerken</h1>
    <form action="{{ route('tournements.update', $tournement) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" value="{{ $tournement->naam }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>
@endsection
