<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'time',
        'difficulty_id',
        'persons_id',
        'type_id',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function difficulty()
    {
        return $this->belongsToMany(Difficulty::class);
    }

    public function persons()
    {
        return $this->belongsToMany(Persons::class);
    }

    public function type()
    {
        return $this->belongsToMany(Type::class);
    }
}
