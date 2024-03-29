<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Model 
{
    use HasFactory, Notifiable;

    protected $guard = 'mahasiswa';
    protected $primaryKey = 'nim';

    protected $fillable = [
        'nim',
        'name',
        'username',
        'address',
        'password',
        'phone',
        'jurusan_id',
        'spp_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function fee(): BelongsTo
    {
        return $this->belongsTo(Spp::class, 'spp_id', 'id');
    }
}
