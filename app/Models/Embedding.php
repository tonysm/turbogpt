<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pgvector\Laravel\Vector;

class Embedding extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $connection = 'embeddings';

    protected $casts = [
        'chunk_size' => 'int',
        'embedding' => Vector::class,
    ];
}
