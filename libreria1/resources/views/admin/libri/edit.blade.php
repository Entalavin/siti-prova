@extends('layouts.admin')
{{-- gli diciamo quale layout prendere, vai dentro la cartella layout e scegli il file admin --}}
@section('title', 'modifica libri')

 @section ('content'){{--ho copiato la pagina create --}}
<div class="container">
    <h1>Modifica libro</h1>
    {{-- @dd($libro) --}}
    <form action="{{route('admin.libri.update', $libro->id)}}" method="POST">
         @method('PUT') {{--da mettere obbligatorio --}}
         @csrf  {{-- genera un token di sicurezza --}}
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo" name=titolo value="{{$libro->titolo}}" required>
            @error('titolo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="autore_id" class="form-label">Autore</label>
            <select class="form-control" id="autore_id" name="autore_id" required>
                @foreach($autori as $autore)
                    <option value="{{$autore->id}}" {{$libro->autore_id == $autore->id ? 'selected' : ''}} >{{$autore->nome}} {{$autore->cognome}} </option>
                @endforeach
            </select>
            {{-- <input type="text" class="form-control" id="autore_id" name=autore_id value="{{$libro->autore_id}}" required> --}}
            @error('autore_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="editore_id" class="form-label">Editore</label>
            <select class="form-control" id="editore_id" name="editore_id" required>
                @foreach($editori as $editore)
                    <option value="{{$editore->id}}" {{$libro->editore_id == $editore->id ? 'selected' : ''}}>{{$editore->denominazione}}</option>
                @endforeach
            </select>
            {{-- <input type="text" class="form-control" id="editore_id" name=editore_id value="{{$libro->editore_id}}" required> --}}
            @error('editore_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name=isbn value="{{$libro->isbn}}" required>
            @error('isbn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="prezzo" name=prezzo value="{{$libro->prezzo}}" required>
            @error('prezzo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="anno" class="form-label">Anno</label>
            <input type="text" class="form-control" id="anno" name=anno value="{{$libro->anno}}" required>
            @error('anno')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lingua" class="form-label">Lingua</label>
            <input type="text" class="form-control" id="lingua" name=lingua value="{{$libro->lingua}}" required>
            @error('lingua')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="categorias" class="form-label">Categorie</label><br>
            @foreach($categorie as $categoria)
                <input type="checkbox" id="categoria_{{$categoria->id}}" name="category[]" value="{{$categoria->id}}" {{$libro->category->contains($categoria->id) ? 'checked' : '' }}>
                <label for="categoria_{{$categoria->id}}"> {{ $categoria->nome }} </label>
            @endforeach
        </div> <br>


        <button type="submit" class="btn btn-primary">Modifica</button>
      </form>
</div>

@endsection