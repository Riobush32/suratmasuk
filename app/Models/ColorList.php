<?php

namespace App\Models;

use App\Models\Sifat;
use App\Models\Status;
use App\Models\Klasifikasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ColorList extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function sifats(): HasMany {
        return $this->hasMany(Sifat::class);
    }

    public function klasifikasis(): HasMany {
        return $this->hasMany(Klasifikasi::class);
    }

    public function statuses(): HasMany {
        return $this->hasMany(Status::class);
    }
}
