<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = [
    						'user_id',
    						'nig',
    						'nama_lengkap',
    						'ttl',
    						'jenis_kelamin',
    						'agama',
    						'telepon',
    						'jabatan',
    						'avatar',
    						'alamat',
    					];

    public function avatar()
    {
        return !$this->avatar ? asset('images/default.png') : $this->avatar; 
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}
