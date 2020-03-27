<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
    						'nis',
    						'nama_lengkap',
    						'ttl',
    						'jenis_kelamin',
    						'agama',
    						'kelas',
    						'avatar',
    						'alamat'
    					];

    public function avatar()
    {
        return !$this->avatar ? asset('images/default.png') : $this->avatar; 
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
    }

    public function rank()
    {
        // Ambil Nilai Rata-rata
        $total = 0;
        $hitung = 0;
        foreach ($this->mapel as $mapel) {
            $total += $mapel->pivot->nilai;
            $hitung++;
        }

        return $hitung == 0 ? 0 : round($total/$hitung);
    }
}
