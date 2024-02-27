<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chats extends Model
{
    use HasFactory;
    protected $table = 'chats';
    
    public function getImage()
    {
        return $this->hasOne(user_chat::class,'id','sender_id');
    }
}
