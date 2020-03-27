<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuInduk extends Model
{
    protected $table = 'buku_induk';
    protected $fillable = [
                            'nis',
    						'nama_lengkap',
    						'ttl',
    						'jenis_kelamin',
    						'agama',
    						'avatar',
    						'alamat',
    						'anak_ke',
    						'nama_ayah',
    						'pendidikan_ayah',
    						'pekerjaan_ayah',
    						'penghasilan_ayah',
    						'nama_ibu',
    						'pendidikan_ibu',
    						'pekerjaan_ibu',
    						'penghasilan_ibu',
    						'alamat_ortu'
    					];

    public function avatar()
    {
        return !$this->avatar ? asset('images/default.png') : $this->avatar; 
    }
}
