<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gold extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'golds';

    protected $fillable = [
        'server_id',
        'faction_id',
        'seller_id',
        'price',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }
}
