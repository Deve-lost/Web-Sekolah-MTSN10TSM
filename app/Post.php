<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
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
                'source' => 'title'
            ]
        ];
    }
    
    protected $fillable = [
    						'user_id',
                            'title',
    						'kategori',
    						'content',
    						'slug',
    						'thumbnail'
    					];

    protected $dates = ['created_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        return !$this->thumbnail ? asset('images/no-thumbnail.png') : $this->thumbnail; 
    }
}
