<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswas";
    public $timestamps = false;
    protected $primaryKey = 'nim';


 protected $fillable = [
 'nim',
 'nama',
 'kelas',
 'jurusan',
 'no_hp',
 ];

};

