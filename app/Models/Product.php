<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the liga that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function liga(): BelongsTo
    {
        return $this->belongsTo(Liga::class, 'liga_id', 'id');
    }

    /**
     * Get all of the pesananDetail for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesananDetail(): HasMany
    {
        return $this->hasMany(PesananDetail::class, 'product_id', 'id');
    }
}
