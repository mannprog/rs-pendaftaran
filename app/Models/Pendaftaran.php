<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
    
    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function ptindakan()
    {
        return $this->hasOne(PendaftaranTindakan::class);
    }

    public function pobat()
    {
        return $this->hasMany(PendaftaranObat::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
