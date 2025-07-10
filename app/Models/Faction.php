<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use HasFactory;

    protected $table = 'factions';

    protected $guarded = [];

    public function golds()
    {
        return $this->hasMany(Gold::class);
    }
}
