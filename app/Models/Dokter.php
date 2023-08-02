<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function ptindakan()
    {
        return $this->hasMany(PendaftaranTindakan::class);
    }
}
