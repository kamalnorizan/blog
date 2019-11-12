<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = true;

    protected $table = 'posts';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }
}
