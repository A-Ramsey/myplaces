<?php

namespace App\Models;

use App\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "notes",
        "star_rating",
        "latitude",
        "longitude",
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
