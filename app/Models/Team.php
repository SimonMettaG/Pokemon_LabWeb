<?php

namespace App\Models;

use App\Models\Pokemon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pokemons(){
        return $this->hasMany(Pokemon::class);
    }

    protected $fillable = [
        'name',
    ];
}
