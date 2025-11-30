<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';
    protected $fillable = ['jemaat_id', 'tanggal', 'jumlah', 'keterangan'];

    public function jemaat()
    {
        return $this->belongsTo(Jemaat::class);
    }
}
