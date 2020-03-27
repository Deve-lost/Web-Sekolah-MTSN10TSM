<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    protected $table = 'slide';
    protected $fillable = [
    						'user_id',
    						'title',
    						'quotes',
    						'image'
    					];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function image()
    {
        return !$this->image ? asset('images/no-thumbnail.png') : $this->image; 
    }
}
