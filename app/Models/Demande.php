<?php

namespace App\Models;

use App\Models\Local;
use App\Models\Regime;
use App\Models\Capital;
use App\Models\Activite;
use App\Models\Paiement;
use App\Models\Dirigeant;
use App\Models\Actionnaire;
use App\Models\Contribuable;
use App\Models\Localisation;
use App\Models\Etablissement;
use App\Models\ChiffreAffaire;
use App\Models\SuiviComptable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paiements(): HasMany
    {
        return $this->hasMany(Paiement::class);
    }

    public function actionnaires(): HasMany
    {
        return $this->hasMany(Actionnaire::class);
    }

    public function activites(): HasMany
    {
        return $this->hasMany(Activite::class);
    }

    public function capitals(): HasOne
    {
        return $this->hasOne(Capital::class);
    }

    public function chiffres_affaires(): HasOne
    {
        return $this->hasOne(ChiffreAffaire::class);
    }

    public function contribuables(): HasOne
    {
        return $this->hasOne(Contribuable::class);
    }

    public function dirigeants(): HasMany
    {
        return $this->hasMany(Dirigeant::class);
    }

    public function etablissements(): HasMany
    {
        return $this->hasMany(Etablissement::class);
    }

    public function localisations(): HasOne
    {
        return $this->hasOne(Localisation::class);
    }

    public function locals(): HasOne
    {
        return $this->hasOne(Local::class);
    }

    public function regimes(): HasOne
    {
        return $this->hasOne(Regime::class);
    }

    public function suivi_comptables(): HasOne
    {
        return $this->hasOne(SuiviComptable::class);
    }

}
