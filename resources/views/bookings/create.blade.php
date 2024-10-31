@extends('layouts.app')

@section('links')
    @vite(['resources/js/bookingsAvailable.js','resources/js/validations/bookingCreate.js'])
@endsection

@section('content')
    <form action="{{ route('booking.store') }}" method="POST" id="myForm">
        @csrf

        <label for="item_id">Dispositivo</label>
        <select name="item_id" id="item_id">
            @foreach ($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <label for="date">Giorno</label>
        <input type="date" name="date" id="date">
        <div class="error"></div>

        <label for="hour_id">Ora</label>
        <select name="hour_id" id="hour_id">
            {{-- gestito dinamicamente da js --}}
        </select>
        <p id="dateError">Seleziona una data per vedere gli orari disponibili</p>

        <button type="submit">Prenota</button>
    </form>
@endsection
