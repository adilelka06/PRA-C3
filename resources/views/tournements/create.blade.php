@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuw Toernooi</h1>
    <form action="{{ route('tournements.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" required>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
