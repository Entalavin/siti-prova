<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autore;
use App\Models\Editore;
use App\Models\Categoria;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libri = Libro::all();
        $autori = Autore::all();
        $editori = Editore::all();
        $categorie = Categoria::all();
        return view('libri.index', compact('libri', 'autori', 'editori', 'categorie'));

    }

    public function index_admin()
    {
        $libri = Libro::all();
        $autori = Autore::all();
        $editori = Editore::all();
        return view('admin.libri.index', compact('libri','autori', 'editori'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autori = Autore::all();
        $editori = Editore::all();
        $categorie = Categoria::all();
        return view('admin.libri.create', compact('categorie','autori', 'editori'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //$request sono i dati che vengono dal form
    {
        //dd($request); //da fare, praticamente fa il vardump e poi muore
        //validazione da fare, checking that data is valid before attempting to use it
        //dd($request->category); //vediamo se arrivano le categorie, l'array l'ho chiamato category[], questi dati che arrivano li attach
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
        // Creazione di un nuovo libro con i dati validati
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
        $libro->category()->attach($request->category); //DA FARE PER FORZA DOPO SAVE. metodo attach legato alla funzione in questo caso category() su Libro. quindi questa funzione prende il libro che ha appena salvato sopra e attacca nella tabella ponte la relativa categoria del libro che si è già creato. il secondo category è il nome che ho dato nel form name="category[]"
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
