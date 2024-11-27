<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public $timestamps = false; // Disable timestamps
    protected $fillable = [
        'name',
        'description',
        'budget',
        'start_campaign',
        'end_campaign',
    ];

    public function influencers()
    {
        return $this->belongsToMany(Influencer::class, 'influencers_campaigns');
    }
}