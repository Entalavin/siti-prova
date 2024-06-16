<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editore extends Model
{
    use HasFactory;
    protected $table = 'editori';
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
} 

