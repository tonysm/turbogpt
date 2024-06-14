<?php

namespace App\Models;

use HotwiredLaravel\TurboLaravel\Models\Broadcasts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    use Broadcasts;

    protected $guarded = [];

    protected $broadcasts = true;

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
