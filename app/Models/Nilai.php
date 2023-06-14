<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable =['nilai','mahasiswa_id', 'kelas_matkul_id'];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
    public function kelasMatkul(){
        return $this->belongsTo(KelasMatkul::class);
    }
}
