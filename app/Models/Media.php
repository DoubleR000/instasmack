<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Str;

class Media extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function path(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Str::startsWith($value, ['http://', 'https://'])
            ? $value
            : Storage::url($value)
        );
    }
}
