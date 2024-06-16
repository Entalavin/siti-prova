@extends('layouts.admin')
{{-- gli diciamo quale layout prendere, vai dentro la cartella layout e scegli il file admin --}}
@section('title', 'lista libri')

@section ('content')
<h1>Lista dei libri</h1>
<a href="{{route('admin.libri.create')}}">Inserisci un nuovo libro</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Titolo</th>
        <th scope="col">Autore</th>
        <th scope="col">Editore</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Operazioni</th>
      </tr>
    </thead>
    <tbody>
      {{-- ciclo foreach per vedere tutti i libri --}}
      @foreach($libri as $libro)
      <tr>
        <th scope="row">{{$libro->id}}</th>
        <td>{{$libro->titolo}}</td>
        <td>{{$libro->autore->nome}} {{$libro->autore->cognome}}</td>
        <td>{{$libro->editore->denominazione}}</td>
        <td>{{$libro->prezzo}}</td>
        <td>
          <a href="{{route('admin.libri.edit', $libro->id)}}">Modifica</a>
          <form action="">
            <input type="submit" value="Cancella">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection