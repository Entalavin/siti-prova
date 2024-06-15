@extends('layouts.app')
{{-- gli diciamo quale layout prendere, vai dentro la cartella layout e scegli il file app --}}
@section('title', 'libri')

@section ('content')
{{-- qua dentro io metterò il mio codice html, una volta finito ci sarà end section e lui prenderà il contenuto di questa section e la metterà nella pagina app --}}
<div>
    {{-- @dd($libri) --}}
    <h1>Questa è la pagina dei libri!</h1>
    <div class="row">
        @foreach ($libri as $libro)
        {{-- @dd($libro) --}}
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$libro->titolo}}</h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Autore: {{$libro->autore_id}}</h6>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Editore: {{$libro->editore_id}}</h6>
                  <p class="card-text">Prezzo: {{$libro->prezzo}} euro</p>
                  <a href="{{route('libri.show', $libro->id)}}" class="card-link">Mostra dettagli</a>
                </div>
              </div>
              
        </div>
        @endforeach
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam dolores atque assumenda ad consectetur rerum vel aspernatur aperiam nobis illum, dolor aliquid, a eligendi voluptate veritatis? Id corporis accusamus veritatis?</p>
</div>
@endsection