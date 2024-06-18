{{-- questa è la mia pagina per mostrare un libro, deve aprirmi questa con l'id del libro che io voglio --}}
@extends('layouts.app')

@section('title', 'libri')

@section ('content')
<h1>{{$libro->titolo}}</h1>
{{-- @dd($libro) --}}
<div class="row">
    <div class="col-md-6">
        <h2>{{$libro->autore_id}}</h2>
        <h3>{{$libro->editore_id}}</h3>
        <p>{{$libro->prezzo}}</p>
    </div>
</div>



@endsection