<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = "message_thread";
    protected $fillable = ['user_1', 'user_2'];
    public function messages()
    {
        return $this->hasMany(Chat::class, 'thread_id');
    }
}
