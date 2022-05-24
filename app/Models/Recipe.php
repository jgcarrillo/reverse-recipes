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
        'time_id',
        'difficulty_id',
        'persons_id',
        'type_id',
        'ingredients',
        'recipe_photo_path'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }

    public function persons()
    {
        return $this->belongsTo(Persons::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }


    public function time()
    {
        return $this->belongsTo(Time::class);
    }

}
