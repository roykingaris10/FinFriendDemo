<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * The Transaction model represents an income or expense record.
 * It maps to the 'transactions' table and allows mass-assignment
 * of key financial fields for each user.
 */
class Transaction extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     * This protects against mass-assignment vulnerabilities.
     */
    protected $fillable = [
        'user_id',       // ID of the user who owns the transaction
        'description',   // Label or note (e.g. "Spotify", "Groceries")
        'amount',        // Decimal value for precise financial records
        'date',          // Date the transaction occurred
        'type',          // 'income' or 'expense'
        'category',      // e.g. 'food', 'rent', 'salary'
    ];

    /**
     * Cast fields into correct PHP types.
     */
    protected $casts = [
        'amount' => 'decimal:2', // Force numeric precision
        'date' => 'date',        // Force proper Carbon date handling
    ];
}
