<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type1',
        'type2',
        'move1',
        'move2',
        'move3',
        'move4',
        'item',
        'team_id'
    ];
}

