<?php

namespace App\Models;

use App\Models\ColorList;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Klasifikasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function color_list(): BelongsTo{
        return $this->belongsTo(ColorList::class);
    }
    public function surat_masuks(): HasMany {
        return $this->hasMany(SuratMasuk::class);
    }
    public function surat_keluars(): HasMany {
        return $this->hasMany(SuratKeluar::class);
    }
}
