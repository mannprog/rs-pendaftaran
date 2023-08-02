<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranTindakan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }
}
