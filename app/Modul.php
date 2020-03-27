<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'modul';
    protected $dates = ['created_at'];
    protected $fillable = [
    						'judul',
    						'data',
    						'user_id'
    					];

   	public function user()
   	{
   		return $this->belongsTo(User::class);
   	}
}
