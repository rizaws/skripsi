<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratDisposisi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function suratMasuk() {
        return $this->belongsTo(SuratMasuk::class, 'id_sm', 'id');
    }

    public function jenisSurat() {
        return $this->belongsTo(JenisSurat::class, 'id_js', 'id');
    }
}
