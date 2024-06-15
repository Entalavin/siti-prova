@extends('layouts.app')
{{-- gli diciamo quale layout prendere, vai dentro la cartella layout e scegli il file app --}}

@section('title', 'home')

@section ('content')
{{-- qua dentro io metterò il mio codice html, una volta finito ci sarà end section e lui prenderà il contenuto di questa section e la metterà nella pagina app --}}
<div>
    <h1>Questa è la home!</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam dolores atque assumenda ad consectetur rerum vel aspernatur aperiam nobis illum, dolor aliquid, a eligendi voluptate veritatis? Id corporis accusamus veritatis?</p>
</div>
@endsection