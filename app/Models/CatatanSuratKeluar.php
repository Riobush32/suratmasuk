<?php

namespace App\Models;

use App\Models\User;
use App\Models\SuratKeluar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CatatanSuratKeluar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function surat_keluar(): BelongsTo{
        return $this->belongsTo(SuratKeluar::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
