<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Sekolah extends Model
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
                'source' => 'judul'
            ]
        ];
    }

    protected $table = 'data_sekolah';
    protected $dates = ['created_at'];

    protected $fillable = [
                            'judul',
    						'nm_kepsek',
    						'deskripsi',
    						'image',
    						'user_id',
    						'slug'
    					];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
