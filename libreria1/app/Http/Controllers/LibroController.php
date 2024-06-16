<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libri = Libro::all();
        return view('libri.index', compact('libri'));
    }

    public function index_admin()
    {
        $libri = Libro::all();
        return view('admin.libri.index', compact('libri'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.libri.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request); //da fare, praticamente fa il vardump e poi muore
        //validazione da fare, checking that data is valid before attempting to use it
        $request->validate([
            'titolo'=>'required|string|min:2|max:255',
            'autore_id'=>'required',
            'editore_id'=>'required',
            'prezzo'=>'required|numeric',
            'anno'=>'required|integer|min:1900|max:'.date('Y'),
            'isbn'=>'required|string|max:20',
            'lingua'=>'required|string|max:2',
        ]);
        //se i campi inseriti non rispettano queste regole non verrà inserito nessun libro, inserire anche la visualizzazione dell'errore nella pagina create
        $libro = new Libro;
        $libro->titolo = $request->titolo;
        $libro->autore_id = $request->autore_id;
        $libro->editore_id = $request->editore_id;
        $libro->prezzo = $request->prezzo;
        $libro->anno = $request->anno;
        $libro->isbn = $request->isbn;
        $libro->lingua = $request->lingua;

        //adesso questa nuova istanza libro può essere salvata

        $libro->save();
        return redirect()->route('admin.libri.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = Libro::findOrFail($id);
        return view('libri.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) //devo dargli il libro da modificare che viene preso dalla index
    {
        $libro = Libro::findOrFail($id);
        return view('admin.libri.edit', compact('libro')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titolo'=>'required|string|min:2|max:255',
            'autore_id'=>'required',
            'editore_id'=>'required',
            'prezzo'=>'required|numeric',
            'anno'=>'required|integer|min:1900|max:'.date('Y'),
            'isbn'=>'required|string|max:20',
            'lingua'=>'required|string|max:2',
        ]);
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        
        return redirect()->route('admin.libri.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
