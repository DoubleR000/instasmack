<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $hidden = [
        'file_path'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
