@extends('layouts.admin')
{{-- gli diciamo quale layout prendere, vai dentro la cartella layout e scegli il file admin --}}
@section('title', 'crea libri')

@section ('content') 
{{-- @dd($categorie) --}}
<div class="container">
    <h1>Inserimento libro</h1>
    <form action="{{route('admin.libri.store')}}" method="post">
         @csrf  {{-- genera un token di sicurezza --}}
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" required>
            @error('titolo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="autore_id" class="form-label">Autore</label>
            {{-- la select serve per selezionare gli autori --}}
            <select class="form-control" id="autore_id" name="autore_id" required>
                @foreach($autori as $autore)
                <option value="{{$autore->id}}">{{$autore->nome}} {{$autore->cognome}} </option>
                @endforeach
            </select>
            @error('autore_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="editore_id" class="form-label">Editore</label>
            <select class="form-control" id="editore_id" name="editore_id" required>
                @foreach($editori as $editore)
                <option value="{{$editore->id}}">{{$editore->denominazione}}</option>
                @endforeach
            </select>
            @error('editore_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category[]" class="form-label">Categorie</label><br>
            @foreach($categorie as $categoria)
            <input type="checkbox" id="categoria_{{$categoria->id}}" name="category[]" value="{{$categoria->id}}">
            <label for="categoria_{{$categoria->id}}"> {{ $categoria->nome }} </label>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
            @error('isbn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="prezzo" name="prezzo" required>
            @error('prezzo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="anno" class="form-label">Anno</label>
            <input type="text" class="form-control" id="anno" name="anno" required>
            @error('anno')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lingua" class="form-label">Lingua</label>
            <input type="text" class="form-control" id="lingua" name="lingua" required>
            @error('lingua')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Inserisci</button>
      </form>
</div>

@endsection