<?php

namespace App\Models;

// use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tindakan extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function ptindakan()
    {
        return $this->hasOne(PendaftaranTindakan::class);
    }
}
