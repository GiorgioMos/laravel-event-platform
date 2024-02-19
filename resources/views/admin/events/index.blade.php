@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                @foreach ($events as $event)
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $event->img) }}" class="card-img-top" alt="{{ $event->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $event->name }}</strong> </h5>
                                <p class="card-text">{{ $event->description }}</p>
                                <p class="card-text"> <strong>Responsabile dell'evento:</strong>
                                    {{ $event->user ? $event->user->name : 'Nessuno' }}</p>
                                <div class="card-footer mb-3">
                                    <small class="text-body-secondary">Data: {{ $event->date }}</small>
                                </div>
                            </div>
                            <div class="card-subtitle mb-2 text-muted pt-2">
                                @if (count($event->tags) > 0)
                                    <ul> Tipo evento:
                                        @foreach ($event->tags as $tag)
                                            <li> {{ $tag->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No Tag #</p>
                                @endif
                            </div>
                            <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-primary">Dettagli</a>
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Cancella" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
