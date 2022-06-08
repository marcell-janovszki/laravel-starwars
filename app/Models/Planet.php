<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $table = 'planet';
    protected $primaryKey = 'id';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name',
        'height',
        'mass',
        'hair_color',
        'skin_color',
        'eye_color',
        'birth_year',
        'gender',
        'homeworld',
        'films',
        'species',
        'vehicles',
        'starships',
        'created',
        'edited',
        'url'
    ];

    protected $casts = [
        'films' => 'array',
        'species' => 'array',
        'vehicles' => 'array',
        'starships' => 'array'
    ];

}
