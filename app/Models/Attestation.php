<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_demande',
        'type_attestation',
        'validation',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
