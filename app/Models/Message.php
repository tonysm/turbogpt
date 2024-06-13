<?php

namespace App\Models;

use HotwiredLaravel\TurboLaravel\Models\Broadcasts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    use Broadcasts;
    use Message\AutoReplies;

    protected $guarded = [];

    protected $casts = [
        'is_from_ai' => 'boolean',
    ];

    protected $broadcasts = true;
    protected $broadcastsTo = ['chat'];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
