<?php

namespace App\Models;

use App\Traits\SaveMedias;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use SaveMedias;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'image_path',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
           ];
    }

    public function media()
    {
        return $this->hasOne(Media::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');

    }
}