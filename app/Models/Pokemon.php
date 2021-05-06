<?php

namespace App\Models;

use App\Models\Team;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    public function team(){
        return $this->belongsTo(Team::class);
    }

    protected $fillable = [
        'name',
        'type1',
        'type2',
        'move1',
        'move2',
        'move3',
        'move4',
        'image'
    ];
}

