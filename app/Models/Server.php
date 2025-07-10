<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $table = 'servers';
    protected $guarded = [];
    protected $fillable = [];

    public function golds()
    {
        return $this->hasMany(Gold::class);
    }
}
