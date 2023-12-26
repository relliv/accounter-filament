<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'company_id',
        'currency_id',
        'billed_at',
        'amount',
        'category_id',
        'contact_id',
        'notes',
    ];

    /**
     * The attributes that should be cast
     *
     * @var array
     */
    protected $casts = [
        'billed_at' => 'datetime',
        'amount' => 'double',
    ];
}
