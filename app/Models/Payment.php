<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'paid_at', 'amount', 'paid_month', 'paid_year',
        'nim',  'spp_id',
    ];

    public function mahasiswa(): HasOne
    {
        return $this->hasOne(Mahasiswa::class, 'nim', 'nim');
    }

    public function fee(): HasOne
    {
        return $this->hasOne(Spp::class, 'id', 'spp_id');
    }
}
