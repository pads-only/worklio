<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'description',
        'team_id',
        'owner_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // public function getStatusAttribute($value)
    // {
    //     return str()->upper($value);
    // }
}
