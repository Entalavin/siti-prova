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
          <form action="{{route('admin.libri.destroy', $libro->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Elimina" onclick="return confirm('Sei sicuro????')">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination-container">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{-- Link alla pagina precedente --}}
            @if ($libri->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $libri->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif
            
            {{-- Link alle pagine --}}
            @foreach ($libri->getUrlRange(1, $libri->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $libri->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach
            
            {{-- Link alla pagina successiva --}}
            @if ($libri->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $libri->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
</div>

@endsection