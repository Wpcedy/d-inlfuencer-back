<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    public $timestamps = false; // Disable timestamps
    protected $fillable = [
        'name',
        'instagram',
        'followers',
        'category',
    ];
}