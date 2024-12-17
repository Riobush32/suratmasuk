<?php

namespace App\Models;

use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class catatanMasuk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function surat_masuk(): BelongsTo{
        return $this->belongsTo(SuratMasuk::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
