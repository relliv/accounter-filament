<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'company_id',
        'invoiced_at',
        'amount',
        'currency_id',
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
        'invoiced_at' => 'datetime',
        'amount' => 'double',
    ];
}
