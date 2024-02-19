@extends('layouts.admin')

@section('content')
    <div>
        <h2>inserisci un evento</h2>
        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!--Token-->
            <div>
                <label for="name">Nome evento</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Inserisci il nome dell'evento" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <label for="available_tickets" class="form-label">Tickets disponibili</label>
                <input type="number" class="form-control @error('available_tickets') is-invalid @enderror"
                    id="available_tickets" name="available_tickets"
                    placeholder="Inserisci la quantita di tickets disponibili" value="{{ old('available_tickets') }}">
                @error('available_tickets')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description" class="form-label">Dettagli evento</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" placeholder="Inserisci una description dell'evento" value="{{ old('description') }}">
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="img" class="form-label">Immagine dell'evento</label>
                <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                    placeholder="Inserisci l'immagine dell'evento" value="{{ old('img') }}">
                @error('img')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="user_id" class="form-label">Admin evento</label>
                <select name="user_id" id="user_id" class="form-select form-select-sm" aria-label="Small select example">
                    <option selected value="">seleziona la persona incaricata dell'evento</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->name }}</option>
                </select>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">seleziona il tipo di evento</label>
                <select multiple name="tags[]" id="tags" class="form-select">
                    <option selected value="">seleziona almeno un tipo</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Inserisci</button>
        </form>
    </div>
@endsection
