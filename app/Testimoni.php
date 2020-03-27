<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni_alumni';
    protected $fillable = [
    						'nama',
    						'lulusan',
    						'caption',
    						'status',
    						'avatar'
    					];

	public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function avatar()
    {
        return !$this->avatar ? asset('images/default.png') : $this->avatar; 
    }

}
