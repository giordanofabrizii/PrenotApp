@extends('layouts.app')

@section('content')
    @if(Auth::user()->role == 'manager') {{-- // only if you are the manager you can see this page --}}
        @if (count($schools) == 0)
            <p>Il cestino &egrave; vuoto</p>
        @else
            @foreach($schools as $school)
                <h2>{{ $school->name }} - <span>Codice: {{ $school->code }}</span></h2>
                <form action="{{ route('manager.forceDelete', $school->id) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button>Elimina</button>
                </form>
            @endforeach
        @endif
    @else
        {{@abort(404)}} {{-- // otherwhise u obtain a 404 --}}
    @endif
@endsection
