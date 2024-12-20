<?php

namespace App\Models;

use App\Models\Sifat;
use App\Models\Status;
use App\Models\Klasifikasi;
use App\Models\CatatanSuratKeluar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sifat(): BelongsTo{
        return $this->belongsTo(Sifat::class);
    }
    public function status(): BelongsTo{
        return $this->belongsTo(Status::class);
    }
    public function klasifikasi(): BelongsTo{
        return $this->belongsTo(Klasifikasi::class);
    }
    public function catatan_surat_keluars(): HasMany {
        return $this->hasMany(CatatanSuratKeluar::class);
    }
}
