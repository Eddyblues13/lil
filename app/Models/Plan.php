<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'swap_fee',
        'pairs',
        'leverage',
        'spread',
    ];

    /**
     * If you have a relationship with investments or users,
     * you can define it here.
     */
    public function investments()
    {
        return $this->hasMany(PlanHistory::class);
    }
}
