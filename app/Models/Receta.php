<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ingredientes',
        'descripcion',
        'tiempo',
        'dificultad',
    ];

    protected $table = "recetas";

    //Relacion ManyToMany
    public function users(){
        return $this->belongsToMany(User::class, 'user_id', 'receta_id');
    }
}
