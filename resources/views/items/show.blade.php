@extends('layouts.app')

@section('content')
    <h1>{{ $item->name }}</h1>
    @if (Auth::user()->role !== 'common')
        <form action="{{ route('item.delete', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">Elimina</button>
        </form>
    @endif
    <h2>Prenotazioni passate:</h2>
    @foreach($bookings as $booking)
        <p>{{ $booking->user->name }}</p>
        <p>{{ $booking->date }}</p>
        <p>{{ $booking->hour->name }}</p>
    @endforeach
@endsection
