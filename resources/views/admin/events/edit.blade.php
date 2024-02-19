@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="mt-3 text-center">Modifica evento</h2>
            <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf <!--Token-->
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome evento</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Inserisci il nome dell'evento"
                        value="{{ old('name') ?? $event->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                placeholder="Inserisci la data dell'evento" value="{{ old('date') ?? $event->date }}">
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="available_tickets" class="form-label">Tickets disponibili</label>
            <input type="number" class="form-control @error('available_tickets') is-invalid @enderror"
                id="available_tickets" name="available_tickets" placeholder="Inserisci la quantita di tickets disponibili"
                value="{{ old('available_tickets') ?? $event->available_tickets }}">
            @error('available_tickets')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione evento</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" placeholder="Inserisci una description dell'evento"
                value="{{ old('description') ?? $event->description }}">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Immagine dell'evento</label>
            <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                placeholder="Inserisci l'immagine dell'evento" value="{{ old('img') ?? $event->img }}">
            @error('img')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Admin dell'evento</label>
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
                <option selected value="">Nessuno</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Inserisci</button>
        </form>

    </div>
    </div>
@endsection
