<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'caption'];

    public function url(): String
    {
        return Storage::url($this->path);
    }

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
