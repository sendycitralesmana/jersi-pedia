<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    /**
     * Get all of the pesananDetail for the Pesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesananDetails(): HasMany
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }

    /**
     * Get the user that owns the Pesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
