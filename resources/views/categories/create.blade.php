@extends('layouts.app')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <label for="icon">Icon</label>
        <input type="text" name="icon" id="icon">

        <label for="name">Nome</label>
        <input type="text" name="name" id="name">

        <button type="submit">Crea category</button>
    </form>
@endsection
