<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['content', 'order'];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
