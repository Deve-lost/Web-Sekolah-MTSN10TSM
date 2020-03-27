<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Gallery extends Model
{
	 use Sluggable;
     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'caption'
            ]
        ];
    }

    protected $table ='gallery';
    protected $dates = ['created_at'];
    protected $fillable = [
    						'caption',
    						'image',
    						'slug',
    						'user_id'
    					];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
