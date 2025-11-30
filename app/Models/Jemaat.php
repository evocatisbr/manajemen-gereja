<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;

    protected $table = 'jemaat';

    protected $fillable = [
        'nama',
        'nik',
        'email',
        'tanggal_lahir',
        'alamat',
        'status',
        'foto',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function keuangan()
{
    return $this->hasMany(Keuangan::class);
}

}


