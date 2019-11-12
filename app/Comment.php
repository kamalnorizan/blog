<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;

    protected $table = 'comments';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
