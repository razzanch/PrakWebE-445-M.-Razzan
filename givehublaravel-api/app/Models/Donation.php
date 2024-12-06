<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations';
    protected $primaryKey = 'id_donasi';

    protected $fillable = [
        'nama_donasi',
        'lokasi_donasi',
        'nama_yayasan',
        'gambar',
        'tanggal_mulai',
        'tanggal_selesai',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
