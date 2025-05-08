<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model

    {
        protected $fillable = ['user_id', 'receiver_id'];

        public function messages()
        {
            return $this->hasMany(Message::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function receiver()
        {
            return $this->belongsTo(User::class, 'receiver_id');
        }
        protected $hidden = ['created_at', 'updated_at'];
    }


