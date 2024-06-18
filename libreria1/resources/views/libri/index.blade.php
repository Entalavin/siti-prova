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
        {{-- @dd($autori) --}}
        {{-- @dd($categorie) --}}
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$libro->titolo}}</h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Autore: {{$libro->autore->nome}} {{$libro->autore->cognome}}</h6> {{-- autore è il nome della relazione che sta nel model del libro --}}
                  <h6 class="card-subtitle mb-2 text-body-secondary">Editore: {{$libro->editore->denominazione}}</h6>
                  @if($libro->category->isNotEmpty())
                  <h6 class="card-subtitle mb-2 text-body-secondary">Categoria:
                    @foreach($libro->category as $categoria){{$categoria->nome}}@unless($loop->last),@endunless
                    @endforeach
                  </h6>
                  @endif
                  <p class="card-text">Prezzo: {{$libro->prezzo}} euro</p>
                   <a href="{{route('libri.show', $libro->id)}}" class="card-link">Mostra dettagli</a> {{--questo $libro->id rispecchia {libro} sulla route libri.show --}}
                </div>
              </div>
              
        </div>
        @endforeach
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam dolores atque assumenda ad consectetur rerum vel aspernatur aperiam nobis illum, dolor aliquid, a eligendi voluptate veritatis? Id corporis accusamus veritatis?</p>
</div>
@endsection