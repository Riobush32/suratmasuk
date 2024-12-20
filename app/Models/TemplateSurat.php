<?php

namespace App\Models;

use App\Models\Klasifikasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateSurat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function klasifikasi(): BelongsTo{
        return $this->belongsTo(Klasifikasi::class);
    }

}
