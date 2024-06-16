<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = 'libri';
    protected $fillable = [ //queste si creano perché sennò io non posso manipolare i dati
        'titolo',
        'autore_id',
        'editore_id',
        'prezzo',
        'anno',
        'isbn',
        'lingua'
    ];
    public $timestamps = false; //si creano solitamente delle colonne in cui si inserisce quando è stato inserito o modificato un record, siccome noi non ce le abbiamo lo mettiamo falso così non le cerca. 
    public function autore(){
        return $this->belongsTo(Autore::class);
    }

    public function editore(){
        return $this->belongsTo(Editore::class);
    }

    public function category() { //l'ho chiamato category per distinguerlo da categoria che uso nell'index ($libro->category as $categoria)
        return $this->belongsToMany(Categoria::class, 'libri_categorie');
    }
}
