@extends('layouts.admin')
{{-- gli diciamo quale layout prendere, vai dentro la cartella layout e scegli il file admin --}}
@section('title', 'crea libri')

@section ('content')
<div class="container">
    <h1>Inserimento libro</h1>
    <form action="{{route('admin.libri.store')}}" method="post">
         @csrf  {{-- genera un token di sicurezza --}}
        <div class="mb-3">
          <label for="titolo" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="titolo" name=titolo required>
        </div>
        <div class="mb-3">
            <label for="autore_id" class="form-label">Autore</label>
            <input type="text" class="form-control" id="autore_id" name=autore_id required>
        </div>
        <div class="mb-3">
            <label for="editore_id" class="form-label">Editore</label>
            <input type="text" class="form-control" id="editore_id" name=editore_id required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name=isbn required>
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="prezzo" name=prezzo required>
        </div>
        <div class="mb-3">
            <label for="anno" class="form-label">Anno</label>
            <input type="text" class="form-control" id="anno" name=anno required>
        </div>
        <div class="mb-3">
            <label for="lingua" class="form-label">Lingua</label>
            <input type="text" class="form-control" id="lingua" name=lingua required>
        </div>
        <button type="submit" class="btn btn-primary">Inserisci</button>
      </form>
</div>

@endsection