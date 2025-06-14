<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'text'];

    // Define the sender relationship
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Define the receiver relationship
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    // Optionally, if you have a Chat model
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

}
