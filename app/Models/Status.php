<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function detailpasien()
    {
        return $this->hasMany(DetailPasien::class);
    }

    public function tindakan()
    {
        return $this->hasOne(Tindakan::class);
    }
}
