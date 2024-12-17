<?php

namespace App\Models;

use App\Models\Sifat;
use App\Models\Status;
use App\Models\Klasifikasi;
use App\Models\catatanMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function klasifikasi(): BelongsTo{
        return $this->belongsTo(Klasifikasi::class);
    }

    public function sifat(): BelongsTo{
        return $this->belongsTo(Sifat::class);
    }

    public function catatan_masuks(): HasMany {
        return $this->hasMany(catatanMasuk::class);
    }

    public function status(): BelongsTo{
        return $this->belongsTo(Status::class);
    }
}
