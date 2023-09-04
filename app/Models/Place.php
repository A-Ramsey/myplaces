<?php

namespace App\Models;

use App\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Place extends Model
{
    use HasFactory;

    protected $attributes = [
        "name" => "",
        "notes" => "",
        "latitude" => 0.0,
        "longitude" => 0.0,
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
