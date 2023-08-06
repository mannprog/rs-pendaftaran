<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function pobat()
    {
        return $this->hasMany(PendaftaranObat::class);
    }
}
