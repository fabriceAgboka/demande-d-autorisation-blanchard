<?php

namespace App\Models;

use App\Models\Demande;
use App\Models\Document;
use App\Models\Telephone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Local extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function demandes(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }

    public function telephones(): MorphMany
    {
        return $this->morphMany(Telephone::class, 'telephoneable');
    }

    public function document(): MorphOne
    {
        return $this->morphOne(Document::class, 'documentable');
    }
}
