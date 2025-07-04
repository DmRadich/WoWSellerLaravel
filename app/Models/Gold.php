<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gold extends Model
{
    use SoftDeletes;

    protected $table = 'gold';

    protected $fillable = [
        'server',
        'faction',
        'description',
        'seller_id',
        'price',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
