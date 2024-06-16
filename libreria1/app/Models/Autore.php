<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autore extends Model //questa tabella è in relazione uno a molti con la tabella libri, ma il model non lo capisce 
{
    use HasFactory;
    protected $table = 'autori';
    protected $fillable = [
        'nome',
        'cognome',
        'nazionalita',
        'data_nascita'

    ];
    public $timestamps = false; 

    public function libri() { // guarda che c'è questa funzione con cui tu autori hai una relazione uno a molti
        return $this->hasMany(Libro::class); //bisogna poi rispondere dall'altro lato
    }
} //ricordati di dire al controller di prendersi autore
