<?php

namespace App\Models;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Telephone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function demandes(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }

    public function telephoneable(): MorphTo
    {
        return $this->morphTo();
    }
}
