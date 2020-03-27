<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Prestasi extends Model
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

    protected $table = 'prestasi';
    protected $dates = ['created_at'];
    protected $fillable = [
    						'judul',
    						'deskripsi',
                            'image',
    						'user_id',
                            'slug'
    					];

    public function getImage()
    {
        return !$this->image ? asset('images/no-thumbnail.png') : $this->image;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
