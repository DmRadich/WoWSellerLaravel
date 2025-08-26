<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gold extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Filterable;


    protected $table = 'golds';

    protected $fillable = [
        'server_id',
        'faction_id',
        'seller_id',
        'price',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class);
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
