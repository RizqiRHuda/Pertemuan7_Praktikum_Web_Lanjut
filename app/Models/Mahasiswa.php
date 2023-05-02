<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswas"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    public $timestamps = false;
    protected $primaryKey = 'nim'; // Memanggil isi DB dengan primarykey


    protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'kelas',
        'jurusan',
        'no_hp',
        'email',
        'tgl_lahir'
    ];

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
};
